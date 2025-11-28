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
            @foreach(\App\Models\Cafe::all() as $cafe)
            <tr>
                <td>{{$cafe->name}}</td>
                <td>{{$cafe->address}}</td>
                <td>{{$cafe->contact_person}}</td>
                <td>{{$cafe->contact_email}}</td>
                <td>{{$cafe->contact_phone}}</td>
                <td>{{ucwords($cafe->status)}}</td>
                <td>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    @if($cafe->status == 'pending')
                    <a href="{{route('cafe.updateStatus',[$cafe->id, 'active'])}}" class="btn btn-sm btn-warning">Approve cafe</a>
                    @elseif($cafe->status == 'active')
                    <a href="{{route('cafe.updateStatus',[$cafe->id, 'inactive'])}}" class="btn btn-sm btn-secondary">Deactivate cafe</a>
                    @else
                    <a href="{{route('cafe.updateStatus',[$cafe->id, 'active'])}}" class="btn btn-sm btn-success">Reactivate cafe</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>
                       
@endsection