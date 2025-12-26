<x-app-layout>
    <br>
    <style>
      .bg
      {
          color:rgb(51, 173, 20) !important; 
        }

        
    </style>


    <!-- Favicon -->
    <link href="User/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/User/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/User/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- Libraries Stylesheet -->
    <link href="User/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="User/lib/tempusdominus/User/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="User/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="User/css/style.css" rel="stylesheet">


    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Sidebar Start -->
        <div class="sidebar" id="sidebar">
            <br>
            <br>

            <nav class="navbar bg-light navbar-light">

                <!-- <a href="index.html" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class="fa fa-hashtag me-2"></i>DASHMIN</h3>
                </a> -->
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="User/img/user.jpg" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border  border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{Auth::user()->name}}</h6>
                        <span>Admin</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="/dashboard" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    


                   
                 
                   
                     <div class="nav-item dropdown " id="complaint">
                        <a href="/complaint" class="nav-link " data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Complains</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <!-- <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a> -->
                        </div>
                    </div>
                     <div class="nav-item dropdown">
                        <a href="/testimonials" class="nav-link " data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Testimonials</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <!-- <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a> -->
                        </div>
                    </div>
                     <div class="nav-item dropdown">
                        <a href="{{ url('/') }}#appointment" class="nav-link " id="appointment" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2" "></i>Book Appointment</a>
                        <div class="dropdown-menu bg-transparent border-0">
                             <li class="appointment-btn"><a href="#appointment">Make an appointment</a></li>
                            <!-- <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a> -->
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="/myappointments" class="nav-link " data-bs-toggle="dropdown" ><i class="far fa-file-alt me-2"></i>My Appointments</a>
                        <div class="dropdown-menu bg-transparent border-0">
                             <li class="appointment-btn"><a href="#appointment">Make an appointment</a></li>
                            <!-- <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a> -->
                        </div>
                    </div>
                    <div class="nav-item dropdown">
                        <a href="/" class="nav-link " data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Go Back To Website</a>
                        <div class="dropdown-menu bg-transparent border-0">
                             <li class="appointment-btn"><a href="/">Go Back To Website</a></li>
                            <!-- <a href="signin.html" class="dropdown-item">Sign In</a>
                            <a href="signup.html" class="dropdown-item">Sign Up</a>
                            <a href="404.html" class="dropdown-item">404 Error</a>
                            <a href="blank.html" class="dropdown-item">Blank Page</a> -->
                        </div>
                    </div>
                </div>
            </nav>
            <button id="sidebarToggle" class="sidebar-toggle-btn" aria-label="Toggle sidebar">
                <i class="fa fa-bars"></i>
            </button>
        </div>
        <!-- Sidebar End -->


        <!-- Content Start -->
        <div class="container-fluid p-4  bg-white ">
            <h1>{{Auth::user()->name}}</h1>
            <p>Welcome to the dashboard!</p>

        </div>

        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/User/js/bootstrap.bundle.min.js"></script>
    <script src="User/lib/chart/chart.min.js"></script>
    <script src="User/lib/easing/easing.min.js"></script>
    <script src="User/lib/waypoints/waypoints.min.js"></script>
    <script src="User/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="User/lib/tempusdominus/User/js/moment.min.js"></script>
    <script src="User/lib/tempusdominus/User/js/moment-timezone.min.js"></script>
    <script src="User/lib/tempusdominus/User/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="User/js/main.js"></script>
    <script>
        document.getElementById('sidebarToggle').addEventListener('click', function(e) {
            e.stopPropagation();
            document.querySelector('.sidebar').classList.toggle('active');
        });

        

    </script>


</x-app-layout>