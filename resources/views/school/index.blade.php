@extends('layouts.app')
@section('title','schools')
@section('content')

    <!-- display school details -->
    <table class="table table-striped">    
        <thead>
            <tr>
                <th>School Name</th>
                <th>School Address</th>
                <th>Contact Person</th>
                <th>Contact Email</th>
                <th>Contact Phone</th>
                <th>Exams</th>
                <th><a href="{{route('school.create',[Auth::user()->profile_id])}}" class="btn btn-sm btn-primary">New School</a></th>
            </tr>
        </thead>   
        <tbody>
            @foreach($profile->schools as $school)
            <tr>
                <td>{{$school->name}}</td>
                <td>{{$school->address}}</td>
                <td>{{$school->contact_person}}</td>
                <td>{{$school->contact_email}}</td>
                <td>{{$school->contact_phone}}</td>
                <td>{{count($school->exams)}}</td>
                <td>
                    <a href="" class="btn btn-sm btn-info">View Exams</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>
                       
@endsection