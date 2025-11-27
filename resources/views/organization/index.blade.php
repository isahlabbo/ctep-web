@extends('layouts.app')
@section('title','organizations')
@section('content')

    <!-- display organization details -->
    <table class="table table-striped">    
        <thead>
            <tr>
                <th>Organization Name</th>
                <th>Organization Address</th>
                <th>Contact Person</th>
                <th>Contact Email</th>
                <th>Contact Phone</th>
                <th>Exams</th>
                <th><a href="{{route('organization.create',[Auth::user()->profile_id])}}" class="btn btn-sm btn-primary">New organization</a></th>
            </tr>
        </thead>   
        <tbody>
            @foreach($profile->organizations as $organization)
            <tr>
                <td>{{$organization->name}}</td>
                <td>{{$organization->address}}</td>
                <td>{{$organization->contact_person}}</td>
                <td>{{$organization->contact_email}}</td>
                <td>{{$organization->contact_phone}}</td>
                <td>{{count($organization->exams)}}</td>
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