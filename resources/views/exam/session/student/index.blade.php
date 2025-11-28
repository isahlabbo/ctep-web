@extends('layouts.app')
@section('title',strtolower($examSession->title).' questions')
@section('content')

    <!-- display centre details -->
    <table class="table table-striped">    
        <thead>
            <tr>
                <th>Name</th>
                <th>Pass Code</th>
                <th>
                    <a href="" data-bs-toggle="modal" data-bs-target="#newStudent" class="btn btn-sm btn-primary">New Student</a>
                    <a href="{{route('exam.session.question.index',[$examSession->id])}}" class="btn btn-sm btn-secondary">Questions</a>
            </th>
            </tr>
            
        </thead>   
        <tbody>
            @foreach($examSession->students as $student)
            <tr>
                <td>{{$student->name}}</td>
                <td>{{$student->passcode}}</td>
                <td>
                    <a href="{{route('exam.session.student.delete',[$student->id])}}" onclick="return confirm('Are you sure, you want to delete this student?')" class="btn btn-outline-danger">Delete</a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#edit_{{$student->id}}" class="btn btn-outline-warning">Edit</a>
                </td>
                @include('exam.session.student.edit')
            </tr>
            @endforeach
        </tbody>    
    </table>
    @include('exam.session.student.create')        
@endsection