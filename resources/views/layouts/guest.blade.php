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
    <main>
        <section id="welcome" class="contaner py-5">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <div class="card-body shadow p-4">
                        <div class="text text-center"><img src="{{asset('images/logo.png')}}" alt="" width="140"></div>
                        @yield('content')
                    </div>
                </div>
            </div>
        </section>
    </main>
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