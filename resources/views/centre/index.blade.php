@extends('layouts.app')
@section('title','centres')
@section('content')

    <!-- display centre details -->
    <table class="table table-striped">    
        <thead>
            <tr>
                <th>Centre Name</th>
                <th>Centre Address</th>
                <th>Contact Person</th>
                <th>Contact Email</th>
                <th>Contact Phone</th>
                <th>Exams</th>
                <th><a href="{{route('centre.create',[Auth::user()->profile_id])}}" class="btn btn-sm btn-primary">New Centre</a></th>
            </tr>
        </thead>   
        <tbody>
            @foreach($profile->centres as $centre)
            <tr>
                <td>{{$centre->name}}</td>
                <td>{{$centre->address}}</td>
                <td>{{$centre->contact_person}}</td>
                <td>{{$centre->contact_email}}</td>
                <td>{{$centre->contact_phone}}</td>
                <td>{{count($centre->exams)}}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-info">View</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>
                       
@endsection