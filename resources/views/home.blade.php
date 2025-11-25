@extends('layouts.app')
@section('title','home')
@section('content')
<div class="row text-center mt-4">
        @if(Auth::user()->profile_id == 1)
        <div class="col-md-3 mb-4">
            <a href="{{route('centre.index',[Auth::user()->profile_id])}}" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-buildings" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                        <h5 class="card-title" style="color: var(--ctep-dark-blue);">My Centres</h5>   
                    </div>
                </div>
            </a>
        </div>
        @endif
        <div class="col-md-3 mb-4">
            <a href="#" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-journal-check" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                        <h5 class="card-title" style="color: var(--ctep-dark-blue);">Exams</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="#" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-book" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                        <h5 class="card-title" style="color: var(--ctep-dark-blue);">Subjects</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="#" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-patch-question" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                        <h5 class="card-title" style="color: var(--ctep-dark-blue);">Questions</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="#" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-graph-up-arrow" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                        <h5 class="card-title" style="color: var(--ctep-dark-blue);">Reports</h5>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-md-3 mb-4">
            <a href="" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-folder2-open" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                        <h5 class="card-title" style="color: var(--ctep-dark-blue);">Students</h5>
                    </div>
                </div>
            </a>
        </div>
    </div>
@endsection
