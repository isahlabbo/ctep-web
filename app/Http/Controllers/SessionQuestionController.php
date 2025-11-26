<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exam;
use App\Models\ExamSession;

class SessionQuestionController extends Controller
{
    public function index($examSessionId) {
        return view('centre.exam.session.question.index',['examSession'=>ExamSession::find($examSessionId)]);
    }
    
    public function register(Request $request, $examSessionId) {
        $request->validate([
            'question'=>'required',
            'option_a'=>'required',
            'option_b'=>'required',
            'option_c'=>'required',
            'option_d'=>'required',
            'answer'=>'required',
        ]);
        $examSession = ExamSession::find($examSessionId);
        $examSession->questions()->create([
            'question_text'=>$request->question,
            'exam_session_subject_id'=>$examSession->exam_type_subject_id,
            'option_a'=>$request->option_a,
            'option_b'=>$request->option_b,
            'option_c'=>$request->option_c,
            'option_d'=>$request->option_d,
            'correct_option'=>$request->answer,
        ]);
        return redirect()->route('centre.exam.session.question.index',[$examSessionId])->with('success','Question registered successfully.');
    }

    public function update(Request $request, $questionId) {
        $request->validate([
            'question'=>'required',
            'option_a'=>'required',
            'option_b'=>'required',
            'option_c'=>'required',
            'option_d'=>'required',
            'answer'=>'required',
        ]);
        $question = \App\Models\Question::find($questionId);
        $question->update([
            'question_text'=>$request->question,
            'option_a'=>$request->option_a,
            'option_b'=>$request->option_b,
            'option_c'=>$request->option_c,
            'option_d'=>$request->option_d,
            'correct_option'=>$request->answer,
        ]);
        return redirect()->route('centre.exam.session.question.index',[$question->exam_session_id])->with('success','Question updated successfully.');
    }
    
    public function delete($questionId) {
        $question = \App\Models\Question::find($questionId);
        $examSessionId = $question->exam_session_id;
        $question->delete();
        return redirect()->route('centre.exam.session.question.index',[$examSessionId])->with('success','Question deleted successfully.');
    }
}
