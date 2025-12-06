<?php

namespace App\Services;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use PDO;
use Exception;

class ExamExportService
{
    /**
     * Create a portable sqlite file for a given exam and save to storage/app/exports.
     * Returns the full local path to the sqlite file.
     */
    public function createSqliteForExam(int $examId): string
    {
        // Ensure export dir
        $exportsDir = storage_path('app/exports');
        if (!is_dir($exportsDir)) mkdir($exportsDir, 0755, true);

        $filename = "exam_{$examId}_" . date('Ymd_His') . '.sqlite';
        $path = $exportsDir . DIRECTORY_SEPARATOR . $filename;

        // Create sqlite PDO
        $sqlitePdo = new \PDO('sqlite:' . $path);
        $sqlitePdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Create minimal schema (adjust to your real schema)
        $sqlitePdo->exec("
            CREATE TABLE IF NOT EXISTS exams (
                id INTEGER PRIMARY KEY,
                exam_type_id INTEGER,
                centre_id INTEGER,
                school_id INTEGER,
                cafe_id INTEGER,
                organization_id INTEGER,
                title TEXT,
                app_code TEXT,
                start_at INTEGER,
                end_at INTEGER,
                capacity INTEGER,
                created_at TEXT,
                updated_at TEXT
            );
        ");
        $sqlitePdo->exec("
            CREATE TABLE IF NOT EXISTS exam_sessions (
                id INTEGER PRIMARY KEY,
                title TEXT,
                date TEXT,
                start TEXT,
                end TEXT,
                exam_id INTEGER, 
                exam_type_subject_id INTEGER,
                created_at TEXT,
                updated_at TEXT
            );
        ");
        $sqlitePdo->exec("
            CREATE TABLE IF NOT EXISTS students (
                id INTEGER PRIMARY KEY,
                exam_session_id INTEGER,
                name TEXT,
                passcode TEXT,
                created_at TEXT,
                updated_at TEXT
            );
        ");
        $sqlitePdo->exec("
            CREATE TABLE IF NOT EXISTS questions (
                id INTEGER PRIMARY KEY,
                exam_session_id INTEGER,
                exam_session_subject_id INTEGER,
                question_text TEXT,
                option_a TEXT,
                option_b TEXT,
                option_c TEXT,
                option_d TEXT,
                correct_option TEXT,
                created_at TEXT,
                updated_at TEXT
            );
        ");
        $sqlitePdo->exec("
            CREATE TABLE IF NOT EXISTS student_answers (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                student_id INTEGER,
                exam_session_id INTEGER,
                question_id INTEGER,
                selected_option TEXT,
                is_correct INTEGER,
                answered_at TEXT,
                created_at TEXT,
                updated_at TEXT
            );
        ");

        // ---------- refactored export snippet (use inside createSqliteForExam) ----------

        // Helper to insert rows into sqlite
        $insertRow = function(string $table, array $cols, $row) use ($sqlitePdo) {
            $placeholders = implode(',', array_fill(0, count($cols), '?'));
            $colList = implode(',', array_map(function($c){ return "`{$c}`"; }, $cols));
            $stmt = $sqlitePdo->prepare("INSERT INTO {$table} ({$colList}) VALUES ({$placeholders})");
            $values = [];
            foreach ($cols as $c) {
                // cast object to array-safe access
                $values[] = is_object($row) ? ($row->$c ?? null) : ($row[$c] ?? null);
            }
            $stmt->execute($values);
        };

        // 1) exam row
        $examRow = DB::table('exams')->where('id', $examId)->first();
        if (!$examRow) throw new Exception("Exam {$examId} not found");
        $insertRow('exams', array_keys((array)$examRow), $examRow);

        // 2) exam_sessions for this exam (there may be multiple sessions)
        $sessionIds = [];
        DB::table('exam_sessions')->where('exam_id', $examId)->orderBy('id')->chunk(500, function($sessions) use ($insertRow, &$sessionIds) {
            foreach ($sessions as $s) {
                $insertRow('exam_sessions', array_keys((array)$s), $s);
                $sessionIds[] = $s->id;
            }
        });

        // if no sessions found, sessionIds will be empty
        if (!empty($sessionIds)) {
            // 3) students (your table name) in those sessions
            DB::table('students')
                ->whereIn('exam_session_id', $sessionIds)
                ->orderBy('id')
                ->chunk(500, function($students) use ($insertRow) {
                    foreach ($students as $st) {
                        $insertRow('students', array_keys((array)$st), $st);
                    }
                });

            // 4) questions in those sessions
            $questionIds = [];
            DB::table('questions')
                ->whereIn('exam_session_id', $sessionIds)
                ->orderBy('id')
                ->chunk(500, function($questions) use ($insertRow, &$questionIds) {
                    foreach ($questions as $q) {
                        $insertRow('questions', array_keys((array)$q), $q);
                        $questionIds[] = $q->id;
                    }
                });

            // 5) candidate_answers (if table exists) -> fetch by question_id or student_id
            try {
                // prefer filtering by question_id if we have them
                if (!empty($questionIds)) {
                    DB::table('candidate_answers')
                        ->whereIn('question_id', $questionIds)
                        ->orderBy('id')
                        ->chunk(500, function($answers) use ($insertRow) {
                            foreach ($answers as $a) {
                                $insertRow('candidate_answers', array_keys((array)$a), $a);
                            }
                        });
                } else {
                    // fallback: select any answers for students in these sessions (if candidate_answers has candidate_id)
                    // gather student ids
                    $studentIds = DB::table('students')->whereIn('exam_session_id', $sessionIds)->pluck('id')->toArray();
                    if (!empty($studentIds)) {
                        DB::table('candidate_answers')
                            ->whereIn('candidate_id', $studentIds)
                            ->orderBy('id')
                            ->chunk(500, function($answers) use ($insertRow) {
                                foreach ($answers as $a) {
                                    $insertRow('candidate_answers', array_keys((array)$a), $a);
                                }
                            });
                    }
                }
            } catch (\Throwable $e) {
                // candidate_answers table might not exist or have different column names
                // log and continue
                // \Log::warning('candidate_answers export skipped: '.$e->getMessage());
            }
        }

        // close sqlite connection (if needed)
        $sqlitePdo = null;
        return $path;

    }
}
