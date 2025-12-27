<style>
    /* Global background override */
    * {
        background-color: transparent;
    }
    
    body, html, .content, main {
        background-color: rgb(243, 244, 246) !important;
    }

    .container {
        margin-top: 100px;
        background: rgb(243, 244, 246);
        background: linear-gradient(135deg, rgba(243, 244, 246, 1) 0%, rgba(40, 167, 69, 0.15) 50%, rgba(243, 244, 246, 1) 100%) !important;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 6px 30px rgba(40, 167, 69, 0.3);
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
        border-color: #28a745;
    }

    .form-control {
        border-radius: 0.5rem;
        transition: border-color 0.3s ease;
    }

    .form-control:focus {
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }

    .inputcolor {
        color: #333;
        border: 1px solid #ccc;
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
        background: linear-gradient(135deg, rgba(243, 244, 246, 1) 0%, rgba(40, 167, 69, 0.15) 50%, rgba(243, 244, 246, 1) 100%) !important;
        border-radius: 12px;
        box-shadow: 0 6px 30px rgba(40, 167, 69, 0.3);
        margin: 0 auto;
    }

    .news-form-header h2 {
        font-size: 28px;
        margin-bottom: 10px;
        color: #2c3e50;
    }

    .news-form-header p {
        color: #495057;
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
        color: #2c3e50;
    }

    .form-control {
        border-radius: 6px;
        padding: 10px;
        font-size: 15px;
    }

    .text-danger {
        font-size: 13px;
    }

    /* Button Style - Changed to Green */
    .btn-primary {
        background-color: #28a745;
        border-color: #28a745;
        font-weight: 500;
        font-size: 16px;
        border-radius: 6px;
    }

    .btn-primary:hover {
        background-color: #218838;
        border-color: #218838;
    }

    /* Table Styling */
    .table {
        color: #2c3e50 !important;
        background-color: white;
    }

    .table-dark {
        background-color: #28a745 !important;
        color: white !important;
    }
    
    .table-dark th {
        background-color: #28a745 !important;
        color: white !important;
        border-color: #28a745 !important;
    }
    
    thead.table-dark {
        background-color: #28a745 !important;
    }

    .table-bordered {
        border-color: #dee2e6;
    }

    .table-hover tbody tr:hover {
        background-color: rgba(40, 167, 69, 0.1);
    }

    /* Heading Styles */
    h1, h2 {
        color: #2c3e50;
    }

    .text-center h2 {
        color: #2c3e50;
    }

    .text-center p {
        color: #495057 !important;
    }

    /* Badge Styling - Changed to Green */
    .badge.bg-danger {
        background-color: #28a745 !important;
        color: white !important;
    }

    .badge.bg-success {
        background-color: #28a745 !important;
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

        .btn-primary {
            width: 100%;
        }
    }

    /* Additional styling for better appearance */
    body {
        background-color: rgb(243, 244, 246) !important;
    }
    
    .content {
        background-color: rgb(243, 244, 246) !important;
    }
    
    .table-responsive {
        background-color: white;
        border-radius: 8px;
        padding: 15px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    hr {
        border-color: #28a745;
        opacity: 0.3;
    }

</style>

@extends('Admin.headerfooter')
@section('content')


<br>
<br>
<br><br>
<br>
<h1 style="color: #333;" >Record</h1>

<div class="container my-5">
    <div class="text-center mb-4">
        <h2 class="fw-bold">All patient appointments</h2>
    </div>

    <div class="table-responsive">
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
                            <span class="badge bg-success text-white">{{ $appointment->status }}</span>
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