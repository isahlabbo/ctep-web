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
    <link rel="icon" type="image/png" href="{{asset('images/logo.png')}}">
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
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm" style="background-color: var(--ctep-white);">
        <div class="container">
            <a class="navbar-brand" href="#welcome"><img src="{{asset('images/logo.png')}}" width="80"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">
                            <i class="bi bi-lightbulb me-1"></i> Exam Bodies
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#features">
                            <i class="bi bi-lightbulb me-1"></i> My Exams
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#modes">
                            <i class="bi bi-motherboard me-1"></i> Subjects
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">
                            <i class="bi bi-person-plus me-1"></i> Exam Sessions
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">
                            <i class="bi bi-person-plus me-1"></i> Questions
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('logout')}}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <i class="bi bi-box-arrow-in-left me-1"></i> Logout
                        </a>
                    </li>
                    <form action="{{route('logout')}}" method="post" id="logout-form">@csrf</form>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section id="welcome" class="container">
            @yield('content')
        </section>


    </mail>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

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