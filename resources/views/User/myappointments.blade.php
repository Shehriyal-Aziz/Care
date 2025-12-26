<!doctype html>
<html lang="en">

<head>
    <title>User Dashboard</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
        crossorigin="anonymous" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link
        rel="icon"
        type="image/x-icon"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/favicon.ico" />
    <link
        rel="stylesheet"

        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" />
    <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <style>
        .care {
            font-size: 40px;
            font-family: inherit;
            padding-right: 2px;
            color: #108916;


        }

        .group {
            color: silver;
            font-size: 45px;
            font-family: inherit;
        }

        .grouplogo {
            color: black;
        }

        .fa-user {
            color: #6dff75;
            font-size: 15px;
            font-weight: 800vh;
            margin-left: -9px;
            padding-right: 2px;
            padding: 5px;
            height: 45px;

        }


        .care-logo {
            font-family: 'Segoe UI', sans-serif;
            font-size: 22px;
            color: #4CAF50;
            /* Care green */
            transition: all 0.3s ease;
            display: flex;
        }
        .care-logo .logo-icon {
    background-color: #4CAF50;
    color: white;
    font-size: 16px;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

    </style>
</head>

<body>
    <nav
        class="navbar navbar-expand-sm navbar-light bg-light">
        <div class="container ">
            <a href="/" class="care-logo text-decoration-none  ">
                <div class="logo-icon ">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="logo-text">
                    <strong>Care</strong><span class="grouplogo">Group</span>
                </div>
            </a>
            <button
                class="navbar-toggler d-lg-none"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#collapsibleNavId"
                aria-controls="collapsibleNavId"
                aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavId">
                <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="/dashboard" aria-current="page">Home
                            <span class="visually-hidden">(current)</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/complaint') }}">Complains</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/testimonials') }}">Testimonials</a>
                    </li>
                   
                    

                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle"
                            href="#"
                            id="dropdownId"
                            data-bs-toggle="dropdown"
                            aria-haspopup="true"
                            aria-expanded="false">Appointments</a>
                        <div
                            class="dropdown-menu"
                            aria-labelledby="dropdownId">
                            <a class="dropdown-item" href="{{ url('/myappointments') }}">My Appointments</a>
                            <a class="dropdown-item" href="{{ url('/') }}#appointment">Book Appointments</a>
                        </div>
                    </li>
                </ul>
                <form class="d-flex my-2 my-lg-0" action="/logout" method="post">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <!--View My Appointments-->
    <div class="container mt-5">
        <h2 class="mb-4">My Appointments</h2>
        <a href="/downloadPDF">Generate a PDF Receipt</a>
        @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if ($appointments->isEmpty())
        <p>No appointments found.</p>
        @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Doctor Name</th>
                    <th>Date</th>

                    <th>Phone Number</th>
                    <th>Reason for Visit</th>
                    <th>Status</th>
                    <th>City</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->id }}</td>
                    <td>{{ $appointment->patient_name }}</td>
                    <td>{{ $appointment->created_at }}</td>

                    <td>{{ $appointment->phone_number }}</td>
                    <td>{{ $appointment->reason_for_visit }}</td>
                    <td>{{ $appointment->status }}</td>
                    <td>{{ $appointment->city }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @endif
        <!-- Bootstrap JavaScript Libraries -->
        <script
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
            integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
            crossorigin="anonymous"></script>

        <script
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
            integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+"
            crossorigin="anonymous"></script>
</body>

</html>