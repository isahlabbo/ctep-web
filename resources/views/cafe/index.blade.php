@extends('layouts.app')
@section('title','cafes')
@section('content')

    <!-- display cafe details -->
    <table class="table table-striped">    
        <thead>
            <tr>
                <th>Cafe Name</th>
                <th>Cafe Address</th>
                <th>Contact Person</th>
                <th>Contact Email</th>
                <th>Contact Phone</th>
                <th>Staus</th>
                <th></th>
            </tr>
        </thead>   
        <tbody>
            @foreach($profile->cafes as $cafe)
            <tr>
                <td>{{$cafe->name}}</td>
                <td>{{$cafe->address}}</td>
                <td>{{$cafe->contact_person}}</td>
                <td>{{$cafe->contact_email}}</td>
                <td>{{$cafe->contact_phone}}</td>
                <td>{{ucwords($cafe->status)}}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>
                       
@endsection