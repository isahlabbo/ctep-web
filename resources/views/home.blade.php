@extends('layouts.app')
@section('title','home')
@section('content')

    <div class="row mt-4">
        @if(Auth::user()->role == 'admin')
            @include('dashboard.admin')
        @else
            @include('dashboard.agent')
        @endif
    </div>
@endsection
