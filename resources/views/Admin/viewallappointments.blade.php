@extends('Admin.headerfooter')
@section('content')
<style>
.table td, .table th {
    font-size: 1rem;
    padding: 12px;
}

.card-body {
    background-color: #1e1e1e;
    color: #fff;
}

.badge {
    padding: 6px 12px;
    font-size: 14px;
    border-radius: 20px;
}

@media (max-width: 768px) {
    .btn {
        width: 100%;
        margin-bottom: 5px;
    }

    .table {
        font-size: 0.9rem;
    }
}
</style>
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-body bg-dark text-white">
                    <h2 class="text-center mb-4">📋 All Appointments</h2>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <strong>Success:</strong> {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-dark table-striped table-bordered align-middle text-center">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Patient Name</th>
                                    <th>Phone Number</th>
                                    <th>Appointment Date</th>
                                    <th>Reason For Visit</th>
                                    <th>Status</th>
                                  
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appointments as $appointment)
                                    <tr>
                                        <td>{{ $appointment->id }}</td>
                                        <td>{{ $appointment->patient_name }}</td>
                                        <td>{{ $appointment->phone_number }}</td>
                                        <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('d M Y') }}</td>
                                        <td>{{ $appointment->reason_for_visit }}</td>
                                        <td>
                                            <span class="badge bg-info text-dark">{{ $appointment->status }}</span>
                                        </td>
                                        
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection