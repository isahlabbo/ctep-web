<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Profile;

class CafeController extends Controller
{
    public function index($profileId) {
        return view('cafe.index',['profile'=>Profile::find($profileId)]);
    }
    
    public function create($profileId) {
        return view('cafe.create',['profile'=>Profile::find($profileId)]);
    }

    public function register(Request $request, $profileId) {
       
        $request->validate([
            'name'=>'required|string|max:255',
            'address'=>'required|string|max:500',
            'lga'=>'required|exists:lgas,id',
            'contact_person'=>'required|string|max:255',
            'contact_phone'=>'required|string|max:20',
            'contact_email'=>'nullable|email|max:255',
        ]);
        $profile = Profile::find($profileId);
        $profile->cafe()->create([
            'name'=>$request->name,
            'address'=>$request->address,
            'lga_id'=>$request->lga,
            'computers'=>$request->capacity,
            'LAN_availability'=>$request->LAN_availability,
            'website'=>$request->website,
            'established_date'=>$request->established_date,
            'code'=>'CTEP-'.substr(md5(time()),0,3).substr(md5($profileId),0,3),
            'contact_person'=>$request->contact_person,
            'contact_phone'=>$request->contact_phone,
            'contact_email'=>$request->contact_email,
        ]);
        return redirect()->route('home')->with('success','cafe Registered Successfully.');
    }
}
