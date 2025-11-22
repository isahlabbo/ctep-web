<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CTEP - CBT Training Environment and Practice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <style>
        /* --- Custom CSS for CTEP Branding --- */
        :root {
            /* User-defined Colors */
            --ctep-white: #FFFFFF;
            --ctep-dark-blue: #2A5783; /* Primary / Outline */
            --ctep-light-blue: #B3E5FC; /* Accent / Glow */
            --ctep-dark-gray: #333333; /* Text */
            --ctep-orange: #FF9800; /* Secondary Accent */

            /* Bootstrap Overrides (using Custom Colors) */
            --bs-primary: var(--ctep-dark-blue);
            --bs-secondary: var(--ctep-orange);
            --bs-body-color: var(--ctep-dark-gray);
            --bs-body-bg: var(--ctep-white);
        }

        body {
            color: var(--bs-body-color);
            background-color: var(--bs-body-bg);
        }
        
       
        .navbar-brand, .nav-link { font-weight: 800; color: var(--ctep-dark-blue); }

        .nav-link:hover {
            color: var(--ctep-orange);
        }
        /* Hero and Backgrounds */
        .hero-section {
             /* Light Blue Accent Background */
            padding: 60px 0;
            text-align: center;
        }
        
        /* Card Styling */
        .feature-card {
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            transition: transform 0.3s;
        }
        .feature-card:hover {
            transform: translateY(-5px);
        }

        /* Specific coloring for the two modes */
        .mode-lan { border-top: 5px solid var(--ctep-dark-blue); }
        .mode-standalone { border-top: 5px solid var(--ctep-orange); }

        /* Footer */
        .footer {
            background-color: var(--ctep-dark-blue);
            color: var(--ctep-white);
            padding: 20px 0;
        }

        /* Customizing primary button outline for consistency */
        .btn-outline-secondary {
            --bs-btn-color: var(--ctep-dark-gray);
            --bs-btn-border-color: var(--ctep-dark-gray);
            --bs-btn-hover-bg: var(--ctep-light-blue);
            --bs-btn-hover-border-color: var(--ctep-dark-blue);
        }

        .navbar-toggler-icon {
            /* This SVG data URI sets the stroke (the lines) to Dark Blue (#2A5783) */
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 30 30'%3e%3cpath stroke='%232A5783' stroke-linecap='round' stroke-miterlimit='10' stroke-width='2' d='M4 7h22M4 15h22M4 23h22'/%3e%3c/svg%3e");
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg navbar-dark sticky-top shadow-sm" style="background-color: var(--ctep-white);">
        <div class="container">
            <a class="navbar-brand" href="#welcome"><img src="{{asset('images/logo.png')}}" width="80"></a><span style="font-weight: 800; color: var(--ctep-dark-blue);">CBT Training Environment & Practice</span>
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
                        <a class="nav-link" href="#modes">
                            <i class="bi bi-motherboard me-1"></i> Deployment
                        </a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#registerModal">
                            <i class="bi bi-person-plus me-1"></i> Register
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
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
                    <p class="lead mb-4">The Complete CBT Training Environment (CTEP) provides schools, centers, and individuals with the tools to create, manage, and take practice exams anywhere.</p>
                    <a href="#" class="btn btn-primary btn-lg me-3" style="background-color: var(--ctep-orange);">Start Registration</a> 
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
    </main>

    <footer class="footer">
        <div class="container text-center">
            <p>&copy; 2025 CTEP - Caliphate Tech. Solutions Limited. All rights reserved.</p>
        </div>
    </footer>

    <div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel" style="color: var(--ctep-dark-blue);">Login or Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="text text-center"><img src="{{asset('images/logo.png')}}" alt=""></div>
                    <form>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="registerModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="loginModalLabel" style="color: var(--ctep-dark-blue);">Login or Register</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="userRole" class="form-label">I am a:</label>
                            <select class="form-select" id="userRole">
                                <option value="individual">Individual / Student</option>
                                <option value="parent">Parent</option>
                                <option value="school">School / Center Administrator</option>
                                <option value="ict_center">ICT Center</option>
                                <option value="community">Community Organization</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" id="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Register</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
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