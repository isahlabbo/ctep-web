@extends('layouts.app')
@section('title',strtolower($examSession->title).' questions')
@section('content')

    <!-- display centre details -->
    <table class="table table-striped">    
        <thead>
            <tr>
                <th>Question</th>
                <th>OPTION A</th>
                <th>OPTION B</th>
                <th>OPTION C</th>
                <th>OPTION D</th>
                <th>Answer</th>
                <th><a href="" data-bs-toggle="modal" data-bs-target="#newQuestion" class="btn btn-sm btn-primary">New Question</a></th>
            </tr>
            
        </thead>   
        <tbody>
            @foreach($examSession->questions as $question)
            <tr>
                <td>{{$question->question_text}}</td>
                <td>{{$question->option_a}}</td>
                <td>{{$question->option_b}}</td>
                <td>{{$question->option_c}}</td>
                <td>{{$question->option_d}}</td>
                <td>{{$question->correct_option}}</td>
                <td>
                    <a href="{{route('centre.exam.session.question.delete',[$question->id])}}" onclick="return confirm('Are you sure, you want to delete this question?')" class="btn btn-sm btn-danger">Delete</a>
                    <a href="" data-bs-toggle="modal" data-bs-target="#edit_{{$question->id}}" class="btn btn-sm btn-warning">Edit</a>
                </td>
                @include('centre.exam.session.question.edit')
            </tr>
            @endforeach
        </tbody>    
    </table>
    @include('centre.exam.session.question.create')        
@endsection