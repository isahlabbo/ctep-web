<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centre;
use App\Models\Organization;
use App\Models\School;
use App\Models\Cafe;
use App\Models\Individual;
use App\Models\Exam;
use Auth;

class ExamController extends Controller
{
    public function index($agentId) {
        
        return view('exam.index',['agent'=>$this->getAgent(Auth::user()->profile_id, $agentId)]);
    }
    
    public function create($profileId) {
        return view('centre.create',['profile'=>Profile::find($profileId)]);
    }

    public function compile($examId) {
        return view('exam.compile',['exam'=>Exam::find($examId)]);
    }

    public function register(Request $request, $agentId) {
        
        $request->validate([
            'title'=>'required|string|max:255',
            'capacity'=>'required',
            'start_date'=>'required',
            'end_date'=>'required',
            'exam_type'=>'required',
        ]);

        $agent = $this->getAgent(Auth::user()->profile_id, $agentId);
   

        $agent->exams()->create([
            'title'=>$request->title,
            'capacity'=>$request->capacity,
            'app_code'=>$agent->code.'-'.count($agent->exams)+1,
            'start_at'=>$request->start_date,
            'end_at'=>$request->end_date,
            'exam_type_id'=>$request->exam_type
        ]);
        return redirect()->route('exam.index',[$agentId])->with('success','Exam registered successfully.');
    
    }

    function getAgent($profileId, $agentId) {
        switch ($profileId) {
            case '1':
                $agent = Centre::find($agentId);
                break;
            case '2':
                $agent = School::find($agentId);
                break;
            case '3':
                $agent = Organization::find($agentId);
                break;
            case '4':
                $agent = Cafe::find($agentId);
                break;
            
            default:
                $agent = Individual::find($agentId);
                break;
        }
        return $agent;
    }

}
