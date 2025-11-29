<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTEP - CBT Training Environment and Practice</title>
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
            <a class="navbar-brand" href="#welcome"><img src="{{asset('images/logo.png')}}" width="80"></a><span style="font-weight: 800; color: var(--ctep-dark-blue); transform: scaleY(2.5);">CBT Training Environment & Practice</span>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#features">
                            <i class="bi bi-lightbulb me-1"></i> Features
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#supports">
                            <i class="bi bi-cash-coin me-1"></i> Support
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#clients">
                            <i class="bi bi-person-lines-fill me-1"></i> Clients
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#modes">
                            <i class="bi bi-motherboard me-1"></i> Deployment
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('register')}}">
                            <i class="bi bi-person-plus me-1"></i> Register
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('login')}}">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Login
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <main>
        <section id="welcome" class="hero-section">
            <div class="row align-items-center">
                <div class="col-lg-6 order-lg-0">
                    <img src="{{asset('images/welcome.png')}}" alt="" width="100%" />
                </div>
                <div class="col-lg-6 order-lg-1 text-start">
                    <h1 class="display-4 fw-bold mb-3" style="color: var(--ctep-dark-blue);">Master Your CBT Exam, Online & Offline.</h1>
                    <p class="lead mb-4">The Complete CBT Training Environment (CTEP) provides schools, centers, and individuals with the tools to create, manage, and take real or practice exams anywhere.</p>
                    <a href="{{route('register')}}" class="btn btn-primary btn-lg me-3">Start Registration</a> 
                    <a href="#features" class="btn btn-outline-secondary btn-lg">Learn More</a>
                </div>
            </div>
        </section>

        <section id="features" class="py-5">
            <div class="container">
                <h2 class="text-center mb-5 fw-bold" style="color: var(--ctep-dark-blue);">Platform Capabilities</h2>
                <div class="row text-center">
                    <div class="col-md-4 mb-4">
                        <div class="card feature-card h-100 p-3">
                            <div class="card-body">
                                <h5 class="card-title" style="color: var(--ctep-dark-blue);">📊 Exam Setup & Management</h5>
                                <p class="card-text">Create detailed exams, set time limits, define subjects, and curate your question database online.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card feature-card h-100 p-3">
                            <div class="card-body">
                                <h5 class="card-title" style="color: var(--ctep-orange);">💾 Offline Delivery</h5>
                                <p class="card-text">Download the complete exam package (software + questions) for deployment in any environment—with or without LAN.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-4">
                        <div class="card feature-card h-100 p-3">
                            <div class="card-body">
                                <h5 class="card-title" style="color: var(--ctep-dark-blue);">👥 Multi-Role Registration</h5>
                                <p class="card-text">Profiles for Schools, ICT Centers, Individuals, and Parents ensure tailored tools and access rights.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="modes" class="py-5" style="background-color: var(--ctep-light-blue);">
            <div class="container">
                <h2 class="text-center mb-5 fw-bold" style="color: var(--ctep-dark-blue);">Flexible Exam Deployment</h2>
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card feature-card mode-lan h-100">
                            <div class="card-body p-4">
                                <h5 class="card-title" style="color: var(--ctep-dark-blue);"> Secondary School with LAN or No LAN</h5>
                                <p class="text-muted">For Schools</p>
                                <ul>
                                    <li>Admin Software (Server): Manages all clients over the network.</li>
                                    <li>Client Software: Students connect to the local server to take the exam.</li>
                                    <li>Benefit: Centralized monitoring and real-time results management without the internet.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card feature-card mode-standalone h-100">
                            <div class="card-body p-4">
                                <h5 class="card-title" style="color: var(--ctep-orange);">Parent to Guide his Children</h5>
                                <p class="text-muted">For Individuals / Parent</p>
                                <ul>
                                    <li>Client Software + SQLite DB: Complete package runs on a single computer.</li>
                                    <li>Benefit: Total portability; no network or server needed. The exam runs completely offline.</li>
                                    <li>Results synced back to the platform later.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card feature-card mode-lan h-100">
                            <div class="card-body p-4">
                                <h5 class="card-title" style="color: var(--ctep-dark-blue);">ICT Center With LAN</h5>
                                <p class="text-muted">For ICT Centers</p>
                                <ul>
                                    <li>Admin Software (Server): Manages all clients over the network.</li>
                                    <li>Client Software: Students connect to the local server to take the exam.</li>
                                    <li>Benefit: Centralized monitoring and real-time results management without the internet.</li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    
                    <div class="col-md-3 mb-4">
                        <div class="card feature-card mode-standalone h-100">
                            <div class="card-body p-4">
                                <h5 class="card-title" style="color: var(--ctep-orange);">Community With Few Computers</h5>
                                <p class="text-muted">For Community or Group of People</p>
                                <ul>
                                    <li>Client Software + SQLite DB: Complete package runs on a single computer.</li>
                                    <li>Benefit: Total portability; no network or server needed. The exam runs completely offline.</li>
                                    <li>Results synced back to the platform later.</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="clients">
            <div class="container m-4">
                <div class="row">
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <i class="bi bi-buildings" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                                <h5 class="card-title" style="color: var(--ctep-dark-blue);">ICT Centres</h5>  
                                <h2>{{count(App\Models\Centre::all())}}</h2> 
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <i class="bi bi-buildings" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                                <h5 class="card-title" style="color: var(--ctep-dark-blue);">Secondary Schools</h5>
                                <h2>{{count(App\Models\School::all())}}</h2>   
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <i class="bi bi-buildings" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                                <h5 class="card-title" style="color: var(--ctep-dark-blue);">Cafes</h5>
                                <h2>{{count(App\Models\School::all())}}</h2>   
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <i class="bi bi-journal-check" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                                <h5 class="card-title" style="color: var(--ctep-dark-blue);">Exams</h5>
                                <h2>{{count(App\Models\Exam::all())}}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <i class="bi bi-book" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                                <h5 class="card-title" style="color: var(--ctep-dark-blue);">Subjects</h5>
                                <h2>{{count(App\Models\Subject::all())}}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <i class="bi bi-patch-question" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                                <h5 class="card-title" style="color: var(--ctep-dark-blue);">Questions</h5>
                                <h2>{{count(App\Models\Question::all())}}</h2>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 mb-4">
                        <div class="card shadow-sm h-100">
                            <div class="card-body d-flex flex-column align-items-center justify-content-center">
                                <i class="bi bi-folder2-open" style="font-size: 3rem; color: var(--ctep-dark-blue);"></i>
                                <h5 class="card-title" style="color: var(--ctep-dark-blue);">Students</h5>
                                <h2>{{count(App\Models\Student::all())}}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section id="supports" class="py-5" style="background-color: var(--ctep-light-blue); border-top: 5px solid var(--ctep-orange);">
    <div class="container">
        <h2 class="text-center mb-4 fw-bold" style="color: var(--ctep-dark-blue);">💖 Support Our Mission. Keep CBT Training Free.</h2>
        
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center mb-5">
                <p class="lead" style="color: var(--ctep-dark-gray);">
                    CTEP is 100% free for all students, schools, and organizations. Your financial support helps us cover server costs, database maintenance, and continuous feature development.
                </p>
            </div>
        </div>
        
        <div class="row text-center">
            
            <div class="col-md-4 mb-4">
                <div class="card h-100 p-3 feature-card">
                    <div class="card-body">
                        <h4 class="card-title" style="color: var(--ctep-dark-blue);"><i class="bi bi-wallet2 me-2"></i> One-Time Contribution</h4>
                        <p class="card-text">Make a secure, one-time donation to support our immediate server and development costs.</p>
                        <a href="#" class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#donateModal">Donate Now</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 p-3 feature-card">
                    <div class="card-body">
                        <h4 class="card-title" style="color: var(--ctep-orange);"><i class="bi bi-person-heart me-2"></i> Sponsor a School</h4>
                        <p class="card-text">Provide funding specifically for technical assistance and outreach to underserved ICT centers.</p>
                        <a href="#" class="btn btn-secondary mt-3">Become a Sponsor</a>
                    </div>
                </div>
            </div>

            <div class="col-md-4 mb-4">
                <div class="card h-100 p-3 feature-card">
                    <div class="card-body">
                        <h4 class="card-title" style="color: var(--ctep-dark-gray);"><i class="bi bi-share me-2"></i> Spread the Word</h4>
                        <p class="card-text">No financial obligation! Help us grow by sharing CTEP with your colleagues and community.</p>
                        <a href="URL_TO_SHARE_PAGE" class="btn btn-outline-secondary mt-3">Share CTEP</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
        <div class="modal fade" id="donateModal" tabindex="-1" aria-labelledby="donateModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="donateModalLabel" style="color: var(--ctep-dark-blue);">Make a Contribution</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <p>Thank you for supporting free education! Please choose your contribution level:</p>
                        <form>
                            <div class="mb-3">
                                <label for="donationAmount" class="form-label">Contribution Amount</label>
                                <select class="form-select" id="donationAmount">
                                    <option selected>Choose an option...</option>
                                    <option value="5">$5 (Covers 1 hour of server costs)</option>
                                    <option value="10">$10 (Covers database backup)</option>
                                    <option value="25">$25 (Supports a development sprint)</option>
                                    <option value="custom">Custom Amount</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Name on Card">
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Proceed to Payment</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <footer class="footer">
        <div class="container text-center">
            <p>&copy; 2025 CTEP - Caliphate Tech. Solutions Limited. All rights reserved.</p>
        </div>
    </footer>

    
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