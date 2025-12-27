<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    <title>AdminDashboard</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="Admin/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Roboto:wght@500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Admin/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="Admin/lib/tempusdominus/Admin/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Admin/css/style.css" rel="stylesheet">

    <!-- Custom Green Theme Override -->
    <style>
        /* Green and White Theme Colors */
        :root {
            --primary-green: #28a745;
            --primary-green-dark: #218838;
            --primary-green-light: #5cb85c;
            --success-green: #20c997;
            --white: #ffffff;
            --light-bg: #f8f9fa;
        }

        /* Primary color changes */
        .text-primary {
            color: var(--primary-green) !important;
        }

        .bg-primary {
            background-color: var(--primary-green) !important;
        }

        .btn-primary {
            background-color: var(--primary-green) !important;
            border-color: var(--primary-green) !important;
        }

        .btn-primary:hover {
            background-color: var(--primary-green-dark) !important;
            border-color: var(--primary-green-dark) !important;
        }

        /* Spinner color */
        .spinner-border.text-primary {
            color: var(--primary-green) !important;
        }

        /* Navigation active state */
        .nav-link.active {
            background-color: var(--primary-green) !important;
    color: white !important;
    border-radius: 8px !important;
        }
        .sidebar .nav-link.dropdown-toggle:hover {
    background-color: var(--primary-green-light) !important;
    color: white !important;
    border-radius: 8px !important;
}
.sidebar .nav-item {
    border-radius: 8px !important;
}
.sidebar .nav-link:hover i {
    color: white !important;
}
.sidebar .nav-link.active i {
    color: white !important;
}

        .nav-link:hover {
          background-color: var(--primary-green-light) !important;
    color: white !important;
    transform: translateX(5px); /* Smooth slide effect */
    border-radius: 8px !important;
        }

        /* Success badge */
        .bg-success {
            background-color: var(--success-green) !important;
        }

        /* Sidebar styling */
        .sidebar {
            background: rgb(243, 244, 246) !important;
        }

        .sidebar .navbar {
            background: rgb(243, 244, 246) !important;
        }

        /* change start from here */
        .sidebar .nav-link {
            color: #2c3e50 !important;
            border-radius: 8px !important;
            /* Square with slightly rounded corners */
            transition: all 0.3s ease !important;
            /* Smooth transition */
            margin-bottom: 0.5rem;
            padding: 0.75rem 1rem !important;
        }

        .sidebar .nav-link:hover {
            background-color: var(--primary-green-light) !important;
            color: white !important;
            transform: translateX(5px);
            /* Smooth slide effect */
            border-radius: 8px !important;
        }

        .sidebar .navbar-brand h3 {
            color: var(--primary-green) !important;
        }

        .sidebar .ms-3 h6,
        .sidebar .ms-3 span {
            color: #2c3e50 !important;
        }

        /* Button styling */
        .btn-success {
            background-color: var(--primary-green) !important;
            border-color: var(--primary-green) !important;
        }

        .btn-success:hover {
            background-color: var(--primary-green-dark) !important;
            border-color: var(--primary-green-dark) !important;
        }

        /* Replace any red/danger buttons with green alternatives */
        .btn-danger {
            background-color: #dc3545 !important;
            border-color: #dc3545 !important;
        }

        /* Navbar brand hover */
        .navbar-brand:hover .text-primary {
            color: var(--primary-green-light) !important;
        }

        /* Dropdown items hover */
        .dropdown-item:hover {
            background-color: #e9ecef !important;
            color: var(--primary-green) !important;
        }

        .dropdown-menu {
            background: rgb(243, 244, 246) !important;
        }

        .dropdown-item {
            color: #2c3e50 !important;
        }

        /* Links */
        a {
            color: var(--primary-green);
        }

        a:hover {
            color: var(--primary-green-dark);
        }

        /* Badges */
        .badge-primary {
            background-color: var(--primary-green) !important;
        }

        /* Borders */
        .border-primary {
            border-color: var(--primary-green) !important;
        }
    </style>

</head>

<body>
    <div class="container-fluid position-relative d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-dark position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar navbar-dark">

                <a href="/" class="navbar-brand mx-4 mb-3">

                    <h3 class="text-primary"><i class=" me-2"></i>AdminPanel</h3>
                </a>

                <div class="d-flex align-items-center ms-4 mb-4">

                    <div class="position-relative">
                        <img class="rounded-circle" src="Admin/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>

                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="/dashboard" class="nav-item nav-link "><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    <!-- doc req -->

                    <a href="/requestbydoctors" class="nav-link "><i class="fa fa-laptop me-2"></i>Req to be doc</a>

                    <!-- doc show -->
                    <a href="/alldoctors" class="nav-item nav-link"><i class="fa fa-th me-2"></i>AllDoctors</a>

                    <a class="nav-link" href="{{ route('admin.cities') }}">
                        <i class="fas fa-city"></i>
                        <span>City Management</span>
                    </a>

                    <a class="nav-link" href="{{ route('admin.branches') }}">
                        <i class="fas fa-clinic-medical"></i>
                        <span style="font-size: clamp(11px, 1.2vw, 13px);font-weight: 800;">Branch Management</span>
                    </a>


                </div>
            </nav>
        </div>
        <!-- Sidebar End -->

        <!-- Content Start -->
        <div class="content">
            <!-- Navbar Start -->
            <nav class="navbar navbar-expand sticky-top px-4 py-0" style="background: rgb(243, 244, 246) !important;">
                <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
                    <h2 class="text-primary mb-0"><i class="fa fa-user-edit"></i></h2>
                </a>
                <a href="#" class="sidebar-toggler flex-shrink-0" style="  color: #333;background-color: #F3F4F6;">
                    <i class="fa fa-th"></i>
                </a>

                <div class="navbar-nav align-items-center ms-auto">
                    <div class="nav-item dropdown">
                    </div>
                    <div class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" style="color: #2c3e50;">
                            <img class="rounded-circle me-lg-2" src="Admin/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                            <span class="d-none d-lg-inline-flex">{{Auth::user()->name}}</span>
                        </a>
                        <div class="dropdown-menu dropdown-menu-end border-0 rounded-0 rounded-bottom m-0" style="background: rgb(243, 244, 246) !important;">
                            <form action="/logout" method="post">
                                @csrf
                                <button type="submit" class="btn btn-danger w-100">Logout</button>
                            </form>
                        </div>
                    </div>
                </div>
            </nav>
            <!-- Navbar End -->

            @yield('content')
        </div>
        <!-- Content End -->
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Admin/lib/chart/chart.min.js"></script>
    <script src="Admin/lib/easing/easing.min.js"></script>
    <script src="Admin/lib/waypoints/waypoints.min.js"></script>
    <script src="Admin/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="Admin/lib/tempusdominus/Admin/js/moment.min.js"></script>
    <script src="Admin/lib/tempusdominus/Admin/js/moment-timezone.min.js"></script>
    <script src="Admin/lib/tempusdominus/Admin/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="Admin/js/main.js"></script>
    <script>
        // Auto-dismiss success alert after 3 seconds
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