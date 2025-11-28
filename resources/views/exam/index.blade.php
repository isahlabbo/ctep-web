@extends('layouts.app')
@section('title',$agent->name.' exams')
@section('content')

    <!-- display centre details -->
    <table class="table table-striped">    
        <thead>
            <tr>
                <th>Title</th>
                <th>Exam Type</th>
                <th>Capacity</th>
                <th>Sessions</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th><a href="" data-bs-toggle="modal" data-bs-target="#newExam" class="btn btn-sm btn-primary">New Exam</a></th>
            </tr>
            
        </thead>   
        <tbody>
            @foreach($agent->exams as $exam)
            <tr>
                <td>{{$exam->title}}</td>
                <td>{{$exam->examType->name}}</td>
                <td>{{$exam->capacity}}</td>
                <td>{{count($exam->examSessions)}}</td>
                <td>{{$exam->start_at}}</td>
                <td>{{$exam->end_at}}</td>
                <td>
                    <a href="{{route('exam.session.index',[$exam->id])}}" class="btn btn-sm btn-info">Exam Sessions</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>
    @include('exam.create')        
@endsection