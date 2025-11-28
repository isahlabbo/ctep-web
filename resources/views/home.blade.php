@extends('layouts.app')
@section('title','home')
@section('content')

@php 
$agent = Auth::user()->agent();
@endphp


    <div class="row mt-4">
        @if(!$agent)
        @include(Auth::user()->profile->path().'.create')
        @elseif($agent->status != 'active')
            <div class="col-md-6">
                <div class="alert alert-warning ">
                    <h6 class="text text-justify" style="text-align: justify; line-height: 1.8; font-size: 1.1rem;">
                    Your application is currently under review. 
                    If the process extends beyond 24 hours, please contact us 
                    via phone at 08162463010 or email at ctep@catsol.ng
                    . In the meantime, you may proceed to plan for your exam session, questions, and candidate arrangement.
                    </h6>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card-body shadow-sm p-4">
                    <table class="">    
                           
                        <tbody>
                            
                            <tr>
                                <th width="60%">Agent Name:</th>
                                <td>{{$agent->name ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Agent Address:</th>
                                <td>{{$agent->address ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Agent Code:</th>
                                <td>{{$agent->code ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Agent Capacity:</th>
                                <td>{{$agent->capacity ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Agent Registration Number:</th>
                                <td>{{$agent->registration_number ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Agent Established Date:</th>
                                <td>{{$agent->established_date ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Agent Website:</th>
                                <td>{{$agent->website ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Contact Person:</th>
                                <td>{{$agent->contact_person ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Contact Email:</th>
                                <td>{{$agent->contact_email ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Contact Phone:</th>
                                <td>{{$agent->contact_phone ?? ''}}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td>{{ucwords($agent->status) ?? ''}}</td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                </td>
                            </tr>
                        
                        </tbody>    
                    </table>
                </div>
            </div>
        @else

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
        @elseif(Auth::user()->profile_id == 2)
        <div class="col-md-3 mb-4">
            <a href="{{route('school.index',[Auth::user()->profile_id])}}" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-buildings" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                        <h5 class="card-title" style="color: var(--ctep-dark-blue);">My Schools</h5>   
                    </div>
                </div>
            </a>
        </div>

        @elseif(Auth::user()->profile_id == 3)
        <div class="col-md-3 mb-4">
            <a href="{{route('organization.index',[Auth::user()->profile_id])}}" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-buildings" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                        <h5 class="card-title" style="color: var(--ctep-dark-blue);">My Organization</h5>   
                    </div>
                </div>
            </a>
        </div>
        
        @elseif(Auth::user()->profile_id == 4)
        <div class="col-md-3 mb-4">
            <a href="{{route('cafe.index',[Auth::user()->profile_id])}}" class="text-decoration-none text-dark">
                <div class="card shadow-sm h-100">
                    <div class="card-body d-flex flex-column align-items-center justify-content-center">
                        <i class="bi bi-buildings" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                        <h5 class="card-title" style="color: var(--ctep-dark-blue);">My Cafe</h5>   
                    </div>
                </div>
            </a>
        </div>
        @endif

        <div class="col-md-3 mb-4">
            <a href="{{route(exam.index,[$agent->id])}}" class="text-decoration-none text-dark">
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
        @endif
    </div>
@endsection
