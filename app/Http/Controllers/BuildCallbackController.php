<?php

namespace App\Http\Controllers;

use App\Models\Build;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BuildCallbackController extends Controller
{
    // POST /api/builds/callback
    public function callback(Request $req)
    {
        // Validate secret token
        $token = $req->header('X-BUILD-CALLBACK-TOKEN');
        if (!$token || $token !== env('BUILD_SERVER_CALLBACK_TOKEN')) {
            return response()->json(['ok'=>false,'message'=>'Unauthorized'], 401);
        }

        $buildId = $req->input('build_id');
        if (!$buildId) return response()->json(['ok'=>false,'message'=>'Missing build_id'], 400);

        $build = Build::where('build_id', $buildId)->first();
        if (!$build) return response()->json(['ok'=>false,'message'=>'Build not found'], 404);

        // Create artifacts folder
        $destDir = storage_path("app/builds/{$build->id}/artifacts");
        @mkdir($destDir, 0755, true);

        $saved = [];
        if ($req->hasFile('artifacts')) {
            foreach ($req->file('artifacts') as $file) {
                $name = $file->getClientOriginalName();
                $target = $destDir . DIRECTORY_SEPARATOR . $name;
                $file->move($destDir, $name);
                $saved[] = $name;
            }
        } else {
            // allow a single file field named 'artifact'
            if ($req->hasFile('artifact')) {
                $file = $req->file('artifact');
                $name = $file->getClientOriginalName();
                $file->move($destDir, $name);
                $saved[] = $name;
            }
        }

        if (empty($saved)) {
            $build->status = 'failed';
            $build->log = 'No artifacts uploaded';
            $build->save();
            return response()->json(['ok'=>false,'message'=>'No artifacts uploaded'], 400);
        }

        // update build
        $build->status = 'success';
        $build->artifacts = $saved;
        $build->save();

        return response()->json(['ok'=>true,'saved' => $saved]);
    }
}
