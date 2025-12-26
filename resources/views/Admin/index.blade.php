<style>

    .container {

        margin-top: 100px;


        background: #030202;
        background: linear-gradient(90deg, rgba(3, 2, 2, 1) 0%, rgba(173, 13, 13, 0.55) 35%, rgba(26, 2, 4, 1) 100%);
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 6px 30px rgb(247, 3, 3);

        width: 100%;



    }

    input {
        background-color: white;
        color: black;
        border: 1px solid #ccc;
        padding: 8px;
        outline: none;


    }

    input:focus {
        background-color: white !important;
        /* prevent it from turning black
      */
        border-color: #007bff;
        /* or any color you like for focus */
    }

    /*i want attractive css for my form */
    .form-control {
        border-radius: 0.5rem;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
    }

    .inputcolor {
        /* Light blue background */
        color: #333;
        /* Dark text color */
        border: 1px solid #ccc;
        /* Light gray border */
    }
    @media screen and (max-width: 768px) {
        .container {
            max-width: 100%;
            padding: 10px;
        }
        
        
    }


    .news-form-section {
    max-width: 100%;
    padding: 30px 15px;
    background: linear-gradient(90deg, rgb(2, 3, 2) 0%, rgba(173, 13, 13, 0.55) 35%, rgba(26, 2, 4, 1) 100%);
    border-radius: 12px;
   box-shadow: 0 6px 30px rgb(247, 3, 3);
    margin: 0 auto;
}

.news-form-header h2 {
    font-size: 28px;
    margin-bottom: 10px;
    color:rgb(255, 255, 255);
}

.news-form-header p {
    color:rgb(250, 253, 255);
    margin-bottom: 30px;
}

.news-form-container {
    max-width: 600px;
    margin: 0 auto;
}

.form-group label {
    font-weight: 500;
    margin-bottom: 5px;
    display: block;
}

.form-control {
    border-radius: 6px;
    padding: 10px;
    font-size: 15px;
}

.text-danger {
    font-size: 13px;
}

/* Button Style */
.btn-danger {
    font-weight: 500;
    font-size: 16px;
    border-radius: 6px;
}
.table   {
    color: white !important;
}

/* Responsive adjustments */
@media (max-width: 576px) {
    .news-form-header h2 {
        font-size: 22px;
    }

    .form-control {
        font-size: 14px;
    }

    .btn-danger {
        width: 100%;
    }
}
</style>

@extends('Admin.headerfooter')
@section('content')


<br>
<br>
<br><br>
<br>
<center><h1>Status</h1></center>
<hr>
<div class="container my-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">Patients Appointment Status</h2>
        <p  style="color: white;">Here you can view the status of all patient appointments.</p>
    </div>

    <div class="table-responsive" >
        <table class="table table-bordered table-hover text-center align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Patient Name</th>
                    <th>Email</th>
                    <th>Date</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @forelse($appointments as $appointment)
                    <tr>
                        <td>{{ $appointment->patient_name }}</td>
                        <td>{{ $appointment->patient_email }}</td>
                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</td>
                        <td>
                            <span class="badge bg-danger text-dark">{{ $appointment->status }}</span>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-muted">No appointments found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
<br>
<br>



@endsection