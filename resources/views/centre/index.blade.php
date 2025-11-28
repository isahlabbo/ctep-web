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
                <th>Status</th>
                <th></th>
            </tr>
        </thead>   
        <tbody>
            @foreach(\App\Models\Centre::all() as $centre)
                <tr>
                    <td>{{$centre->name}}</td>
                    <td>{{$centre->address}}</td>
                    <td>{{$centre->contact_person}}</td>
                    <td>{{$centre->contact_email}}</td>
                    <td>{{$centre->contact_phone}}</td>
                    <td>{{ucwords($centre->status)}}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-danger">Delete</a>
                        @if($centre->status == 'pending')
                        <a href="{{route('centre.updateStatus',[$centre->id, 'active'])}}" class="btn btn-sm btn-warning">Approve Centre</a>
                        @elseif($centre->status == 'active')
                        <a href="{{route('centre.updateStatus',[$centre->id, 'inactive'])}}" class="btn btn-sm btn-secondary">Deactivate Centre</a>
                        @else
                        <a href="{{route('centre.updateStatus',[$centre->id, 'active'])}}" class="btn btn-sm btn-success">Reactivate Centre</a>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>    
    </table>
                       
@endsection