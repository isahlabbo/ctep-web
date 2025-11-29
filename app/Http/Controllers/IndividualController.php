<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Individual;
use App\Models\Profile;

class IndividualController extends Controller
{
    public function index() {
        return view('individual.index');
    }

    public function updateStatus($individualId , $status) {
        $individual = Individual::find($individualId);
        if($individual) {
            $individual->status = $status;
            $individual->save();
            return redirect()->route('individual.index')->with('success','individual updated and status is '.$status);
        } 
        return redirect()->route('individual.index')->with('error','individual not found.');
    }

    public function view($profileId) {
        return view('individual.index',['profile'=>Profile::find($profileId)]);
    }
    
    public function register(Request $request, $profileId) {
        $request->validate([
            'purpose'=>'required|string|max:255',
            'address'=>'required|string|max:500',
            'lga'=>'required|exists:lgas,id',
            'mode'=>'required',
            'contact_phone'=>'required|string|max:20',
            'contact_email'=>'nullable|email|max:255',
        ]);
        $profile = Profile::find($profileId);
        $profile->individual()->create([
            'purpose'=>$request->purpose,
            'address'=>$request->address,
            'lga_id'=>$request->lga,
            'capacity'=>$request->capacity,
            'LAN_availability'=>$request->LAN_availability,
            'mode'=>$request->mode,
            'office_space'=>$request->office_space,
            'code'=>'CTEP-'.substr(md5(time()),0,3).substr(md5($profileId),0,3),
            'contact_phone'=>$request->contact_phone,
            'contact_email'=>$request->contact_email,
        ]);
        return redirect()->route('home')->with('success','Individual Registered Successfully.');
    }
}
