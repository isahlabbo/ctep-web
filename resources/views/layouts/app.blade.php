<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTEP - @yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
    <link rel="icon" type="image/png" href="{{asset('images/logo.png')}}" style="border-radius: 50%;">
    <style>
        .nav-link {
            color: var(--ctep-dark-blue) !important;
            font-weight: 600;
            font-size: 1.12rem;
            transition: color 0.7s;
        }
        .nav-link:hover {
            color: var(--ctep-orange) !important;
        }
        footer {
            background-color: var(--ctep-dark-blue);
            color: white;
            padding: 15px 0;
        }
    </style>
</head>
@php 
    $agent = Auth::user()->agent();
@endphp
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm" style="background-color: var(--ctep-white);">
        <div class="container">
            <a class="navbar-brand" href="#welcome"><img src="{{asset('images/logo.png')}}" width="80"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <ul class="navbar-nav ms-auto">
                    
    
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
                    <li class="nav-item">
                        <a class="nav-link" href="#subjects-link">
                            <i class="bi bi-book me-1"></i> Subjects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#exam-sessions-link">
                            <i class="bi bi-calendar-event me-1"></i> Exam Sessions
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#questions-link">
                            <i class="bi bi-patch-question me-1"></i> Questions
                        </a>
                    </li>
                    @endif
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-right me-1"></i> Logout
                        </a>
                    </li>
                    <form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section id="welcome" class="container pt-4">
            <!-- display a session message here -->
             @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('success')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{session('error')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @yield('content')
        </section>


    </mail>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script
        src="https://code.jquery.com/jquery-3.6.4.min.js"
        integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8="
        crossorigin="anonymous">
    </script>
    <script src="{{asset('js/Ajax/address.js')}}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const userRoleSelect = document.getElementById('userRole');
            
            // Simple JS to log selected role (can be expanded for dynamic form changes)
            if (userRoleSelect) {
                userRoleSelect.addEventListener('change', (event) => {
                    console.log('Selected User Role:', event.target.value);
                    // TODO: Implement logic to dynamically show/hide specific registration fields
                });
            }
            
            // Example of a simple alert when a user attempts to download software
            document.querySelectorAll('a[href="#download"]').forEach(link => {
                link.addEventListener('click', (e) => {
                    e.preventDefault();
                    alert('Redirecting to the download area. Please login as an Admin/School/ICT Center to access software.');
                });
            });

            // Initializing all tooltips and popovers if you add them later
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        });
    </script>
</body>
</html>