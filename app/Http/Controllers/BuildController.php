<?php

namespace App\Http\Controllers;

use App\Models\Build;
use App\Services\ExamExportService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;
use Exception;

class BuildController extends Controller
{
    protected $exportService;

    public function __construct(ExamExportService $exportService)
    {
        $this->exportService = $exportService;
    }

    /**
     * Start compile process for an exam.
     */
    public function startCompile(Request $req, $examId)
    {
        // 1. create sqlite locally
        $sqlitePath = $this->exportService->createSqliteForExam((int)$examId);
        $basename = basename($sqlitePath);

        // key/path we will use in R2
        $r2Key = 'exports/' . $basename;

        // 2. upload to Cloudflare R2 (disk 'r2' must be configured in filesystems.php)
        try {
            // Use stream to avoid loading whole file into memory
            Storage::disk('r2')->put($r2Key, fopen($sqlitePath, 'r'));
        } catch (\Throwable $e) {
            // fail early if upload doesn't work
            return response()->json([
                'ok' => false,
                'message' => 'Failed to upload sqlite to R2: ' . $e->getMessage()
            ], 500);
        }

        // 3. generate presigned url (2 hours)
        try {
            $signedUrl = Storage::disk('r2')->temporaryUrl($r2Key, now()->addHours(2));
        } catch (\Throwable $e) {
            // cleanup optional: remove uploaded file if you want
            // Storage::disk('r2')->delete($r2Key);
            return response()->json([
                'ok' => false,
                'message' => 'Failed to generate temporary URL from R2: ' . $e->getMessage()
            ], 500);
        }

        // 4. create build record
        $build = Build::create([
            'exam_id' => $examId,
            'build_id' => Str::random(12),
            'status' => 'queued',
            // store the R2 key in existing column; rename later if you add sqlite_r2_path
            'sqlite_s3_path' => $r2Key,
        ]);

        // 5. dispatch workflow
        $owner = env('GITHUB_OWNER');
        $repo = env('GITHUB_REPO');
        $workflowFile = env('GITHUB_WORKFLOW_FILE', 'build-exam-electron.yml');
        $token = env('GITHUB_PAT');

        $dispatchUrl = "https://api.github.com/repos/{$owner}/{$repo}/actions/workflows/{$workflowFile}/dispatches";

        try {
            $resp = Http::withHeaders([
                'Accept' => 'application/vnd.github+json',
                'Authorization' => 'Bearer ' . $token,
                'User-Agent' => config('app.name'),
            ])->post($dispatchUrl, [
                'ref' => env('GITHUB_BUILD_REF', 'main'),
                'inputs' => [
                    'exam_sql_url'   => $signedUrl,
                    'exam_filename'  => $basename,
                    'build_id'       => $build->build_id,
                    'callback_url'   => route('builds.callback'),
                ]
            ]);
        } catch (\Throwable $e) {
            // network / http client exception
            $build->update([
                'status' => 'failed',
                'log' => 'Dispatch exception: ' . $e->getMessage(),
            ]);
            return response()->json(['ok' => false, 'message' => 'Exception dispatching workflow', 'error' => $e->getMessage()], 500);
        }

        if ($resp->failed()) {
            $build->update([
                'status' => 'failed',
                'log' => $resp->body()
            ]);
            return response()->json(['ok' => false, 'message' => 'Failed to dispatch build', 'body' => $resp->body()], 500);
        }

        // success
        return response()->json(['ok' => true, 'build' => $build, 'signed_url_expires_at' => now()->addHours(2)->toDateTimeString()]);
    }

    /**
     * Status endpoint for polling
     */
    public function status($buildId)
    {
        $build = Build::where('build_id', $buildId)->firstOrFail();
        return response()->json(['ok'=>true,'build'=>$build]);
    }

    /**
     * Download artifact by filename (protected route)
     */
    public function downloadArtifact($buildId, $filename)
    {
        $build = Build::where('build_id', $buildId)->firstOrFail();
        // sanitize filename
        $filename = basename($filename);
        $path = storage_path("app/builds/{$build->id}/artifacts/{$filename}");
        if (!file_exists($path)) abort(404);
        return response()->download($path, $filename);
    }
}
