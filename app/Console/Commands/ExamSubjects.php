<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ExamSubjects extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'exam:subjects-gennerate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $exams = [
            [
                "name" => "WAEC",
                "subjects" => [
                    "Mathematics",
                    "English Language",
                    "Biology",
                    "Physics",
                    "Chemistry",
                    "Agricultural Science",
                    "Government",
                    "Economics",
                    "Geography",
                    "Commerce",
                    "Financial Accounting",
                    "Literature in English",
                    "CRS/IRS",
                    "Further Mathematics",
                    "Civic Education",
                    "Marketing",
                    "History"
                ]
            ],

            [
                "name" => "NECO",
                "subjects" => [
                    "Mathematics",
                    "English Language",
                    "Biology",
                    "Physics",
                    "Chemistry",
                    "Agricultural Science",
                    "Government",
                    "Economics",
                    "Geography",
                    "Commerce",
                    "Financial Accounting",
                    "Literature in English",
                    "CRS/IRS",
                    "Further Mathematics",
                    "Civic Education",
                    "Marketing",
                    "History"
                ]
            ],

            [
                "name" => "NABTEB",
                "subjects" => [
                    "Mathematics",
                    "English Language",
                    "Biology",
                    "Physics",
                    "Chemistry",
                    "Information & Communication Technology",
                    "Office Practice",
                    "Bookkeeping",
                    "Automobile Technology",
                    "Electrical Installation",
                    "Welding & Fabrication",
                    "Building Construction",
                    "Carpentry & Joinery",
                    "Civic Education",
                    "Economics"
                ]
            ],

            [
                "name" => "JAMB",
                "subjects" => [
                    "Use of English",
                    "Mathematics",
                    "Biology",
                    "Physics",
                    "Chemistry",
                    "Government",
                    "Economics",
                    "Geography",
                    "Commerce",
                    "CRS",
                    "IRS",
                    "Literature in English",
                    "Agriculture",
                    "History",
                    "Civic Education"
                ]
            ]
        ];
        foreach ($exams as $examData) {
            $examType = \App\Models\ExamType::where('name', $examData['name'])->first();
            if ($examType) {
                foreach ($examData['subjects'] as $subjectName) {
                    $subject = \App\Models\Subject::firstOrCreate(['name' => $subjectName]);
                    // Create the pivot record
                    \App\Models\ExamTypeSubject::firstOrCreate([
                        'exam_type_id' => $examType->id,
                        'subject_id' => $subject->id
                    ]);
                }
            }
        }

    }
}
