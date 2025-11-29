@extends('layouts.app')
@section('title','individuals')
@section('content')

    <!-- display individual details -->
    <table class="table table-striped">    
        <thead>
            <tr>
                <th>Individual Purpose</th>
                <th>Individual Address</th>
                <th>Mode</th>
                <th>Contact Email</th>
                <th>Contact Phone</th>
                <th>Staus</th>
                <th></th>
            </tr>
        </thead>   
        <tbody>
            @foreach(\App\Models\Individual::all() as $individual)
            <tr>
                <td>{{$individual->purpose}}</td>
                <td>{{$individual->address}}</td>
                <td>{{$individual->mode}}</td>
                <td>{{$individual->contact_email}}</td>
                <td>{{$individual->contact_phone}}</td>
                <td>{{ucwords($individual->status)}}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    @if($individual->status == 'pending')
                    <a href="{{route('individual.updateStatus',[$individual->id, 'active'])}}" class="btn btn-sm btn-warning">Approve individual</a>
                    @elseif($individual->status == 'active')
                    <a href="{{route('individual.updateStatus',[$individual->id, 'inactive'])}}" class="btn btn-sm btn-secondary">Deactivate individual</a>
                    @else
                    <a href="{{route('individual.updateStatus',[$individual->id, 'active'])}}" class="btn btn-sm btn-success">Reactivate individual</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>
                       
@endsection