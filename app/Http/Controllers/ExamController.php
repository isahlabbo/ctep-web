<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centre;

class ExamController extends Controller
{
    public function index($centreId) {
        return view('centre.exam.index',['centre'=>Centre::find($centreId)]);
    }
    
    public function create($profileId) {
        return view('centre.create',['profile'=>Profile::find($profileId)]);
    }

    public function register(Request $request, $centreId) {
        
        $request->validate([
            'title'=>'required|string|max:255',
            'capacity'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'exam_type'=>'required',
        ]);

        $centre = Centre::find($centreId);
        $centre->exams()->create([
            'title'=>$request->title,
            'capacity'=>$request->capacity,
            'app_code'=>$centre->code.'-'.count($centre->exams)+1,
            'start_at'=>$request->start_date,
            'end_at'=>$request->end_date,
            'exam_type_id'=>$request->exam_type
        ]);
        return redirect()->route('centre.exam.index',[$centreId])->with('success','Exam registered successfully.');
    
    }

}
