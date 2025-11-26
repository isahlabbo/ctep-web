<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ExamSession;
use App\Models\Student;

class SessionStudentController extends Controller
{
    public function index($examSessionId) {
        return view('centre.exam.session.student.index',['examSession'=>ExamSession::find($examSessionId)]);
    }
    
    public function register(Request $request, $examSessionId) {
        $request->validate([
            'name'=>'required',
        ]);
        $examSession = ExamSession::find($examSessionId);
        $examSession->students()->create([
            'name'=>$request->name,
            'passcode'=>substr(md5(count(\App\Models\Student::all())),0,3).substr(md5($request->passcord.time()),0,3),
        ]);
        return redirect()->route('centre.exam.session.student.index',[$examSessionId])->with('success','Student registered successfully.');
    }

    public function update(Request $request, $studentId) {
       $request->validate([
            'name'=>'required',
            'passcode'=>'required',
        ]);
        $student = Student::find($studentId);
        $student->update([
            'name'=>$request->name,
            'passcode'=>substr(md5(count(\App\Models\Student::all())),0,3).substr(md5($request->passcord.time()),0,3),
        ]);
        return redirect()->route('centre.exam.session.student.index',[$student->exam_session_id])->with('success','Student updated successfully.');
    }
    
    public function delete($studentId) {
        $student = \App\Models\Student::find($studentId);
        $examSessionId = $student->exam_session_id;
        $student->delete();
        return redirect()->route('centre.exam.session.student.index',[$examSessionId])->with('success','Student deleted successfully.');
    }
}
