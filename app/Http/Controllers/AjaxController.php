<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lga;


class AjaxController extends Controller
{
    
    public function getLgas($stateId)
    {
        return response()->json(Lga::where(['state_id'=>$stateId])->pluck('name','id'));
    }
 
}
