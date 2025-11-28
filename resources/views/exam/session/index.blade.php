@extends('layouts.app')
@section('title',strtolower($exam->title).' sessions')
@section('content')

    <!-- display centre details -->
    <table class="table table-striped">    
        <thead>
            <tr>
                <th>Title</th>
                <th>Date</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Students</th>
                <th>Questions</th>
                <th>Duration (Minutes)</th>
                <th><a href="" data-bs-toggle="modal" data-bs-target="#newExamSession" class="btn btn-sm btn-primary">New Exam Session</a></th>
            </tr>
            
        </thead>   
        <tbody>
            @foreach($exam->examSessions as $examSession)
            <tr>
                <td>{{$examSession->title}}</td>
                <td>{{$examSession->date}}</td>
                <td>{{$examSession->start}}</td>
                <td>{{$examSession->end}}</td>
                <td>{{count($examSession->students)}}</td>
                <td>{{count($examSession->questions)}}</td>
                <td>{{$examSession->duration()}}</td>
                <td>
                    <a href="{{route('exam.session.student.index', [$examSession->id])}}" class="btn btn-sm btn-info">Students</a>
                    <a href="{{route('exam.session.question.index', [$examSession->id])}}" class="btn btn-sm btn-info">Questions</a>
                    <a href="#" class="btn btn-sm btn-danger">Delete</a>
                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                </td>
            </tr>
            @endforeach
        </tbody>    
    </table>
    @include('exam.session.create')        
@endsection