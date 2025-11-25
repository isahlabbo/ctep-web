<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;

class ExamSessionController extends Controller
{
    public function index($examId) {
        return view('centre.exam.session.index',['exam'=>Exam::find($examId)]);
    }
    
    public function register(Request $request, $examId) {
        
        $request->validate([
            'title'=>'required',
            'subject'=>'required',
            'date'=>'required',
            'start_time'=>'required',
            'end_time'=>'required',
        ]);

        $exam = Exam::find($examId);
        $exam->examSessions()->create([
            'exam_type_subject_id'=>$request->subject,
            'date'=>$request->date,
            'start'=>$request->start_time,
            'end'=>$request->end_time,
            'title'=>$request->title,
        ]);
        return redirect()->route('centre.exam.session.index',[$examId])->with('success','Exam Session registered successfully.');
    
    }

}
