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
                <th>Status</th>
                <th></th>
            </tr>
        </thead>   
        <tbody>
            @foreach(\App\Models\School::all() as $school)
            <tr>
                <td>{{$school->name}}</td>
                <td>{{$school->address}}</td>
                <td>{{$school->contact_person}}</td>
                <td>{{$school->contact_email}}</td>
                <td>{{$school->contact_phone}}</td>
                <td>{{ucwords($school->status)}}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    @if($school->status == 'pending')
                    <a href="{{route('school.updateStatus',[$school->id, 'active'])}}" class="btn btn-sm btn-warning">Approve school</a>
                    @elseif($school->status == 'active')
                    <a href="{{route('school.updateStatus',[$school->id, 'inactive'])}}" class="btn btn-sm btn-secondary">Deactivate school</a>
                    @else
                    <a href="{{route('school.updateStatus',[$school->id, 'active'])}}" class="btn btn-sm btn-success">Reactivate school</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>
                       
@endsection