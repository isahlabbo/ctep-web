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
                <th>Status</th>
                <th></th>
            </tr>
        </thead>   
        <tbody>
            @foreach(\App\Models\Organization::all() as $organization)
            <tr>
                <td>{{$organization->name}}</td>
                <td>{{$organization->address}}</td>
                <td>{{$organization->contact_person}}</td>
                <td>{{$organization->contact_email}}</td>
                <td>{{$organization->contact_phone}}</td>
                <td>{{ucwords($organization->status)}}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    @if($organization->status == 'pending')
                    <a href="{{route('organization.updateStatus',[$organization->id, 'active'])}}" class="btn btn-sm btn-warning">Approve organization</a>
                    @elseif($organization->status == 'active')
                    <a href="{{route('organization.updateStatus',[$organization->id, 'inactive'])}}" class="btn btn-sm btn-secondary">Deactivate organization</a>
                    @else
                    <a href="{{route('organization.updateStatus',[$organization->id, 'active'])}}" class="btn btn-sm btn-success">Reactivate organization</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>
                       
@endsection