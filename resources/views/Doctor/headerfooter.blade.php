<!DOCTYPE html>
<html lang="en">

<head>
    <title>Doctor Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('Doctor/assets/images/favicon.ico') }}" type="image/x-icon">
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Custom Stylesheet -->
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root {
            --primary-green: #28a745;
            --primary-green-dark: #218838;
            --primary-green-light: #5cb85c;
            --success-green: #20c997;
            --white: #ffffff;
            --light-bg: #f8f9fa;
            --dark-text: #2c3e50;
        }

        body {
            font-family: 'Open Sans', sans-serif;
            background: #f8f9fa;
        }

        /* Spinner */
        #spinner {
            opacity: 0;
            visibility: hidden;
            transition: opacity .5s ease-out, visibility 0s linear .5s;
            z-index: 99999;
        }

        #spinner.show {
            transition: opacity .5s ease-out, visibility 0s linear 0s;
            visibility: visible;
            opacity: 1;
        }

        .spinner-border {
            color: var(--primary-green) !important;
        }

        /* Layout Container */
        .container-fluid {
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 250px;
            height: 100vh;
            overflow-y: auto;
            background: rgb(243, 244, 246);
            transition: 0.5s;
            z-index: 999;
            padding: 20px 0;
        }

        .sidebar .navbar {
            background: rgb(243, 244, 246);
        }

        .sidebar .navbar-brand {
            padding: 0 1.5rem;
            margin-bottom: 1rem;
        }

        .sidebar .navbar-brand h3 {
            color: var(--primary-green);
            font-weight: 700;
            margin: 0;
        }

        .sidebar .user-profile-section {
            display: flex;
            align-items: center;
            padding: 0 1.5rem 1.5rem;
            margin-bottom: 1rem;
        }

       

        .sidebar .user-profile-section .bg-success {
            background-color: var(--success-green) !important;
            width: 10px;
            height: 10px;
        }

        .sidebar .user-profile-section .ms-3 h6 {
            color: var(--dark-text);
            margin: 0;
            font-weight: 600;
        }

        .sidebar .user-profile-section .ms-3 span {
            color: #6c757d;
            font-size: 0.875rem;
        }

        .sidebar .navbar-nav {
            width: 100%;
            padding: 0 1rem;
        }

        .sidebar .nav-link {
            color: var(--dark-text) !important;
            border-radius: 8px;
            transition: all 0.3s ease;
            margin-bottom: 0.5rem;
            padding: 0.75rem 1rem;
            display: flex;
            align-items: center;
            font-weight: 500;
        }

        .sidebar .nav-link i {
            margin-right: 0.5rem;
            width: 20px;
            transition: color 0.3s ease;
        }

        .sidebar .nav-link:hover {
            background-color: var(--primary-green-light);
            color: white !important;
            transform: translateX(5px);
        }

        .sidebar .nav-link:hover i {
            color: white !important;
        }

        .sidebar .nav-link.active {
            background-color: var(--primary-green);
            color: white !important;
        }

        .sidebar .nav-link.active i {
            color: white !important;
        }

        /* Content Area */
        .content {
            margin-left: 250px;
            min-height: 100vh;
            transition: 0.5s;
        }

        /* Navbar */
        .navbar-top {
            background: rgb(243, 244, 246);
            padding: 1rem 1.5rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.08);
            position: sticky;
            top: 0;
            z-index: 998;
        }

        .sidebar-toggler {
            border: none;
            background: transparent;
            color: #333;
            font-size: 1.25rem;
            cursor: pointer;
            padding: 0.5rem;
            transition: 0.3s;
        }

        .sidebar-toggler:hover {
            color: var(--primary-green);
        }

        .navbar-top .nav-link.dropdown-toggle {
            color: var(--dark-text);
            display: flex;
            align-items: center;
            padding: 0.5rem;
            border-radius: 8px;
            transition: 0.3s;
        }

        .navbar-top .nav-link.dropdown-toggle:hover {
            background: rgba(40, 167, 69, 0.1);
        }

      

        .dropdown-menu {
            background: rgb(243, 244, 246);
            border: none;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        .dropdown-item {
            color: var(--dark-text);
            padding: 0.75rem 1.25rem;
            transition: 0.3s;
        }

        .dropdown-item:hover {
            background-color: #e9ecef;
            color: var(--primary-green);
        }

        /* Page Header */
        .page-header {
            background: white;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        }

        .page-header h5 {
            color: var(--dark-text);
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .page-header p {
            color: #6c757d;
            margin: 0;
        }

        .breadcrumb {
            background: transparent;
            margin: 0;
            padding: 0;
        }

        .breadcrumb-item a {
            color: var(--primary-green);
            text-decoration: none;
        }

        .breadcrumb-item a:hover {
            color: var(--primary-green-dark);
        }

        /* Buttons */
        .btn-primary {
            background-color: var(--primary-green);
            border-color: var(--primary-green);
        }

        .btn-primary:hover {
            background-color: var(--primary-green-dark);
            border-color: var(--primary-green-dark);
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        /* Responsive */
        @media (max-width: 991.98px) {
            .sidebar {
                margin-left: -250px;
            }

            .sidebar.open {
                margin-left: 0;
            }

            .content {
                margin-left: 0;
            }
        }

        /* Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border" style="width: 3rem; height: 3rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->

    <div class="container-fluid position-relative d-flex p-0">
        <!-- Sidebar Start -->
        <div class="sidebar" id="sidebar">
            <nav class="navbar navbar-dark">
                <a href="/" class="navbar-brand">
                    <h3><i class="fas fa-heartbeat me-2"></i>Doctor Panel</h3>
                </a>

                <div class="user-profile-section">
                    
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <span>Doctor</span>
                    </div>
                </div>

                <div class="navbar-nav w-100">
                    <a href="/DoctorDashboard" class="nav-link active">
                        <i class="fas fa-tachometer-alt"></i>
                        <span>Dashboard</span>
                    </a>
                    <a href="/doctor/profile" class="nav-link">
                        <i class="fas fa-user"></i>
                        <span>View Profile</span>
                    </a>
                    <a href="/doctor/appointments" class="nav-link">
                        <i class="fas fa-calendar-check"></i>
                        <span>Appointments</span>
                    </a>
                    
                    <a href="/" class="nav-link">
                        <i class="fas fa-globe"></i>
                        <span>Back To Website</span>
                    </a>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand navbar-top">
                <button class="sidebar-toggler" id="sidebarToggle">
                    <i class="fas fa-bars"></i>
                </button>

                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                            <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end rounded m-0">
                            <a href="/doctor/profile" class="dropdown-item">
                                <i class="fas fa-user me-2"></i>Profile
                            </a>
                            <a href="/doctor/settings" class="dropdown-item">
                                <i class="fas fa-cog me-2"></i>Settings
                            </a>
                            <hr class="dropdown-divider">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="dropdown-item text-danger">
                                    <i class="fas fa-sign-out-alt me-2"></i>Logout
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            <!-- Page Header -->
            <div class="container-fluid pt-4 px-4">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <h5>Dashboard</h5>
                            <p>Welcome to Care Doctor Panel</p>
                        </div>
                        <div class="col-md-4">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb float-md-end mb-0">
                                    <li class="breadcrumb-item">
                                        <a href="/"><i class="fas fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>

                <!-- Content Area -->
                <div class="pcoded-inner-content">
                    @yield('content')
                </div>
            </div>
        </div>
        <!-- Content End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Custom Script -->
    <script>
        // Spinner
        window.addEventListener('load', function() {
            setTimeout(function() {
                document.getElementById('spinner').classList.remove('show');
            }, 300);
        });

        // Sidebar Toggle
        document.getElementById('sidebarToggle').addEventListener('click', function() {
            document.getElementById('sidebar').classList.toggle('open');
        });

        // Auto-dismiss success alert
        document.addEventListener('DOMContentLoaded', function() {
            const successAlert = document.getElementById('successAlert');
            if (successAlert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(successAlert);
                    bsAlert.close();
                }, 3000);
            }
        });
    </script>
</body>

</html>