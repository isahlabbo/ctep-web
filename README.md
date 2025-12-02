1 — Prep: repo & Electron template

Put your Electron template in the repo that will run the GitHub Action (or in a repo dedicated to builds).

Template must expect the exam DB at assets/exam.sqlite (or a filename you choose).

main.js should load DB from isDev ? ./assets/exam.sqlite : process.resourcesPath + '/assets/exam.sqlite'.

Add electron-builder config to package.json and ensure better-sqlite3 (or sqlite lib) is a dependency.

Add .github/workflows/build-exam-electron.yml (workflow file we will trigger).

2 — Laravel: export exam → create portable SQLite file

Implement a service method that creates the SQLite file for an exam and returns its server path. (We sketched ExamExportService::createSqliteForExam($examId) earlier.)

Save the file under storage/app/exports/ (or upload directly to S3). Example (S3 presigned pattern recommended):

// create and save file locally
$localPath = storage_path("app/exports/exam_{$examId}.sqlite");
ExamExportService::createSqliteForExam($examId, $localPath); // implement this

// create presigned URL (S3) — recommended
use Illuminate\Support\Facades\Storage;
$s3Path = "exports/exam_{$examId}_" . time() . '.sqlite';
Storage::disk('s3')->put($s3Path, file_get_contents($localPath));
$signedUrl = Storage::disk('s3')->temporaryUrl($s3Path, now()->addMinutes(60));


If you don’t use S3, you can supply a Laravel signed route that streams the file (URL::temporarySignedRoute) which Actions can download if it’s reachable publicly.

3 — Create a GitHub PAT & configure secrets

Create a GitHub Personal Access Token (PAT) with repo + workflow scopes (or use a GitHub App).

In your Laravel environment or secrets manager store:

GITHUB_PAT (used by Laravel to call the workflow_dispatch endpoint).

Optionally GITHUB_OWNER, GITHUB_REPO, GITHUB_WORKFLOW_FILENAME.

For the GitHub Actions workflow side, you can use the built-in GITHUB_TOKEN to upload artifact or perform repo operations inside the workflow; no extra secret needed in the workflow itself.

4 — Laravel: trigger the workflow (workflow_dispatch)

After you have signedUrl and exam_filename, call the GitHub API workflow_dispatch to dispatch workflow with inputs.

Example Laravel code (use Http client):

use Illuminate\Support\Facades\Http;

$token = env('GITHUB_PAT');
$owner = 'YOUR_GITHUB_OWNER';
$repo  = 'YOUR_BUILD_REPO';
$workflowFile = 'build-exam-electron.yml'; // filename in .github/workflows

$resp = Http::withHeaders([
    'Accept' => 'application/vnd.github+json',
    'Authorization' => 'Bearer '.$token,
])->post("https://api.github.com/repos/{$owner}/{$repo}/actions/workflows/{$workflowFile}/dispatches", [
    'ref' => 'main',
    'inputs' => [
        'exam_sql_url' => $signedUrl,
        'exam_filename' => basename($s3Path),
        'node_version' => '20'
    ]
]);

if ($resp->failed()) {
    // handle failure
}

5 — GitHub Actions workflow: download exam and build

Use the workflow YAML (file .github/workflows/build-exam-electron.yml) — main points:

Accept exam_sql_url and exam_filename via workflow_dispatch inputs.

Steps:

Checkout repo

Setup Node

curl the exam_sql_url → save to assets/${exam_filename}

npm ci and npm run build (if relevant)

Run npx electron-builder for the platform

actions/upload-artifact the dist/ outputs

(Optional) final step: call back to your Laravel app with run id & artifact names

Important: Make sure assets/ is included in files or extraResources config in package.json so electron-builder packages the DB.

(You already have a full example YAML — use that and adjust targets you need.)

6 — (Optional but recommended) Add callback step so Laravel is notified

Add a final step in the workflow that POSTs artifact info back to your Laravel endpoint (so you don’t have to poll). Example (in a workflow step):

- name: Notify server with artifacts
  run: |
    ARTIFACTS_JSON=$(jq -n '{run_id: $RUN_ID, os: env.MATRIX_OS, artifacts: (inputs)}')
    curl -X POST -H "Content-Type: application/json" -H "Authorization: Bearer ${{ secrets.SERVER_CALLBACK_TOKEN }}" \
      -d "{\"run_id\":\"${{ github.run_id }}\",\"artifacts\":$(jq -c '.[]' dist || echo '[]')}" \
      https://yourserver.example.com/api/builds/callback
  env:
    RUN_ID: ${{ github.run_id }}
    MATRIX_OS: ${{ matrix.os }}


Better: collect actual artifact filenames then POST them. On the Laravel side create /api/builds/callback that accepts the run id and artifact list and stores them (or directly downloads artifacts via GitHub API).

For security, configure SERVER_CALLBACK_TOKEN and validate it on your server.

7 — How Laravel can obtain the artifacts (2 options)

A — Use the callback (recommended): workflow POSTS artifact info to your server after successful run; server fetches artifacts via GitHub Artifact API or server uses provided artifact download URLs (if you zipped them to a public location).

B — Poll GitHub API from Laravel:

After dispatch, call GET /repos/{owner}/{repo}/actions/runs to find the run (use the dispatch time and inputs).

Wait until run finishes (status: completed) and conclusion: success.

GET /repos/{owner}/{repo}/actions/runs/{run_id}/artifacts → get artifact_id → GET /repos/{owner}/{repo}/actions/artifacts/{artifact_id}/zip to download.
Use Http::withToken(env('GITHUB_PAT'))->get(...) in Laravel.

8 — Save artifacts and show download buttons in admin UI

When Laravel downloads an artifact ZIP, extract it to storage/app/builds/{buildId}/artifacts/.

Create a DB record builds with id, exam_id, run_id, artifacts[] and store artifact file names & status.

In the admin UI show download links pointing to a secure route:

Route::get('/builds/{id}/download/{filename}', [BuildController::class, 'download'])
  ->middleware(['auth','can:download-build']);


download() should check path, sanitize filename, and response()->download($path).

9 — Electron runtime: load exam DB from resources

Make sure your Electron main.js finds the DB path both in dev and packaged modes:

const path = require('path');
const isDev = require('electron-is-dev');

const dbFilename = process.env.EXAM_FILENAME || 'exam.sqlite';

let dbPath;
if (isDev) {
  dbPath = path.join(__dirname, 'assets', dbFilename);
} else {
  dbPath = path.join(process.resourcesPath, 'assets', dbFilename);
}

10 — Security & practical tips

Use signed, time-limited URLs for exam_sql_url (S3 presigned or Laravel signed route). Don’t expose exam DB publicly long-term.

Use a dedicated PAT with minimal scopes for dispatching workflows; store it in env. Consider a GitHub App for production.

Validate callback requests with a server token. Use HTTPS.

Limit how long artifacts are retained (retention-days in Actions upload-artifact).

Keep builds off your web server (use Actions) to avoid resource contention.

Consider code signing for Windows/macOS installers if distributing widely.

11 — Testing checklist (do in this order)

Confirm Electron template packages successfully locally with a sample assets/exam.sqlite.

Create a small test exam and export a .sqlite and upload to S3 / signed route.

Manually trigger the GitHub workflow (via Actions UI) using that exam_sql_url to validate the workflow downloads the file and packages it.

Inspect the Action run: check dist/ and artifacts.

Implement callback step and test that Laravel receives artifact list.

Implement Laravel artifact download + admin UI buttons.

End-to-end test: admin clicks Compile → waits for notification → downloads executables → run Electron clients to confirm exam DB is embedded.

12 — Code snippets you’ll need (summary)

ExamExportService::createSqliteForExam($examId, $path) — creates the sqlite file.

Laravel code to upload file to S3 and produce temporaryUrl.

Laravel code to POST workflow_dispatch (snippet above).

GitHub Actions workflow (we gave full YAML earlier).

Workflow final step (optional) to curl your server callback with artifact info.

Laravel polling or callback handler to fetch artifacts and store them.

Admin UI to surface download links.