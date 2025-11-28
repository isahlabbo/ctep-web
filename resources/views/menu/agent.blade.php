@php 
    $agent = Auth::user()->agent();
@endphp

@if($agent && $agent->status == 'active')
    
    @if(Auth::user()->profile_id == 1)
    <li class="nav-item">
        <a class="nav-link" href="{{route('centre.index',[Auth::user()->profile_id])}}">
            <i class="bi bi-buildings me-1"></i> My Centre
        </a>
    </li>
    @endif

    @if(Auth::user()->profile_id == 2)
    <li class="nav-item">
        <a class="nav-link" href="{{route('school.index',[Auth::user()->profile_id])}}">
            <i class="bi bi-buildings me-1"></i> My School
        </a>
    </li>
    @endif

    @if(Auth::user()->profile_id == 3)
    <li class="nav-item">
        <a class="nav-link" href="{{route('organization.index',[Auth::user()->profile_id])}}">
            <i class="bi bi-buildings me-1"></i> My Organization
        </a>
    </li>
    @endif

    @if(Auth::user()->profile_id == 4)
    <li class="nav-item">
        <a class="nav-link" href="{{route('cafe.index',[Auth::user()->profile_id])}}">
            <i class="bi bi-buildings me-1"></i> My Cafe
        </a>
    </li>
    @endif
    
    <li class="nav-item">
        <a class="nav-link" href="{{route('exam.index',[$agent->id])}}">
            <i class="bi bi-journal-check me-1"></i> My Exams
        </a>
    </li>
    
@endif