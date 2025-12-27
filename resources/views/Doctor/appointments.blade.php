@extends('Doctor.headerfooter')

@section('content')
<style>
    /* Page Content Wrapper */
    .content-wrapper {
        background: #f8f9fa;
        padding: 0;
    }

    /* Section Headers */
    .section-header {
        background: white;
        padding: 1.25rem 1.5rem;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0,0,0,0.05);
        margin-bottom: 1.5rem;
        border-left: 4px solid #28a745;
    }

    .section-header h2,
    .section-header h3 {
        color: #2c3e50;
        font-weight: 600;
        margin: 0;
        font-size: 1.5rem;
    }

    /* Success Alert */
    .alert-success {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
        border-radius: 8px;
        color: white;
        padding: 1rem 1.25rem;
        margin-bottom: 1.5rem;
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.2);
    }

    .alert-success strong {
        font-weight: 600;
    }

    .btn-close-white {
        filter: brightness(0) invert(1);
    }

    /* Card Container */
    .card-container {
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.08);
        padding: 1.5rem;
        margin-bottom: 2rem;
    }

    /* Table Styles */
    .table-responsive {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        border-radius: 8px;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        margin: 0;
        min-width: 900px;
    }

    .table thead {
        background: linear-gradient(90deg, #28a745 0%, #20c997 100%);
        color: #fff;
    }

    .table th {
        padding: 1rem 1.25rem;
        text-align: left;
        font-weight: 600;
        letter-spacing: 0.5px;
        font-size: 0.9rem;
        text-transform: uppercase;
        border: none;
    }

    .table td {
        padding: 1rem 1.25rem;
        text-align: left;
        border-bottom: 1px solid #f0f0f0;
        color: #2c3e50;
        font-size: 0.95rem;
    }

    .table tbody tr {
        transition: all 0.2s ease;
    }

    .table tbody tr:hover {
        background: #f8f9fa;
        transform: scale(1.01);
        box-shadow: 0 2px 8px rgba(0,0,0,0.05);
    }

    .table tr:last-child td {
        border-bottom: none;
    }

    /* Action Buttons in Table */
    .table .btn {
        padding: 0.4rem 1rem;
        font-size: 0.875rem;
        border-radius: 6px;
        font-weight: 500;
        transition: all 0.2s ease;
        border: none;
    }

    .table .btn-success {
        background: #28a745;
        color: white;
    }

    .table .btn-success:hover {
        background: #218838;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(40, 167, 69, 0.3);
    }

    .table .btn-danger {
        background: #dc3545;
        color: white;
        margin-left: 0.5rem;
    }

    .table .btn-danger:hover {
        background: #c82333;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(220, 53, 69, 0.3);
    }

    /* Status Badges */
    .badge {
        padding: 0.4rem 0.8rem;
        border-radius: 6px;
        font-weight: 500;
        font-size: 0.85rem;
        text-transform: capitalize;
    }

    .badge-secondary {
        background: #6c757d;
        color: white;
    }

    .status-available {
        color: #28a745;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
    }

    .status-available::before {
        content: "●";
        margin-right: 0.5rem;
        font-size: 1.2rem;
    }

    .status-unavailable {
        color: #dc3545;
        font-weight: 600;
        display: inline-flex;
        align-items: center;
    }

    .status-unavailable::before {
        content: "●";
        margin-right: 0.5rem;
        font-size: 1.2rem;
    }

    /* Availability Table */
    .availability-table-responsive {
        width: 100%;
        overflow-x: auto;
        border-radius: 8px;
    }

    .availability-table {
        width: 100%;
        border-collapse: collapse;
        background: #fff;
        margin: 0;
        min-width: 600px;
    }

    .availability-table thead {
        background: linear-gradient(90deg, #20c997 0%, #28a745 100%);
        color: #fff;
    }

    .availability-table th {
        padding: 1rem 1.25rem;
        text-align: left;
        font-weight: 600;
        letter-spacing: 0.5px;
        font-size: 0.9rem;
        text-transform: uppercase;
        border: none;
    }

    .availability-table td {
        padding: 1rem 1.25rem;
        text-align: left;
        border-bottom: 1px solid #f0f0f0;
        color: #2c3e50;
        font-size: 0.95rem;
    }

    .availability-table tbody tr {
        transition: all 0.2s ease;
    }

    .availability-table tbody tr:hover {
        background: #f8f9fa;
    }

    .availability-table tr:last-child td {
        border-bottom: none;
    }

    /* Update Availability Form Card */
    .update-availability-card {
        background: white;
        border-radius: 10px;
        box-shadow: 0 4px 20px rgba(40, 167, 69, 0.1);
        padding: 2rem;
        max-width: 500px;
        margin: 0 auto;
        border: 1px solid #e8f5e9;
    }

    .update-availability-card .form-group {
        margin-bottom: 1.25rem;
    }

    .update-availability-card label {
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 0.5rem;
        display: block;
        font-size: 0.95rem;
    }

    .update-availability-card select,
    .update-availability-card input[type="time"] {
        width: 100%;
        padding: 0.75rem 1rem;
        border: 2px solid #e9ecef;
        border-radius: 8px;
        font-size: 0.95rem;
        background: #f8f9fa;
        transition: all 0.3s ease;
        color: #2c3e50;
    }

    .update-availability-card select:focus,
    .update-availability-card input[type="time"]:focus {
        border-color: #28a745;
        outline: none;
        background: white;
        box-shadow: 0 0 0 3px rgba(40, 167, 69, 0.1);
    }

    .update-availability-card .checkbox-wrapper {
        display: flex;
        align-items: center;
        padding: 0.75rem;
        background: #f8f9fa;
        border-radius: 8px;
        margin-bottom: 1.5rem;
    }

    .update-availability-card input[type="checkbox"] {
        width: 20px;
        height: 20px;
        accent-color: #28a745;
        margin-right: 0.75rem;
        cursor: pointer;
    }

    .update-availability-card .checkbox-wrapper label {
        margin: 0;
        cursor: pointer;
        user-select: none;
    }

    .update-availability-card button[type="submit"] {
        background: linear-gradient(135deg, #28a745 0%, #20c997 100%);
        border: none;
        color: white;
        font-weight: 600;
        padding: 0.875rem 2rem;
        width: 100%;
        border-radius: 8px;
        font-size: 1rem;
        box-shadow: 0 4px 12px rgba(40, 167, 69, 0.2);
        transition: all 0.3s ease;
        cursor: pointer;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .update-availability-card button[type="submit"]:hover {
        background: linear-gradient(135deg, #218838 0%, #1ea97c 100%);
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(40, 167, 69, 0.3);
    }

    .update-availability-card button[type="submit"]:active {
        transform: translateY(0);
    }

    /* Empty State */
    .empty-state {
        text-align: center;
        padding: 3rem 1rem;
        color: #6c757d;
    }

    .empty-state i {
        font-size: 3rem;
        margin-bottom: 1rem;
        color: #dee2e6;
    }

    /* Spacing */
    .section-spacing {
        margin-bottom: 3rem;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .section-header h2,
        .section-header h3 {
            font-size: 1.25rem;
        }

        .card-container {
            padding: 1rem;
        }

        .update-availability-card {
            padding: 1.5rem;
        }

        .table th,
        .table td,
        .availability-table th,
        .availability-table td {
            padding: 0.75rem;
            font-size: 0.875rem;
        }
    }
</style>


<div class="content-wrapper">
    <!-- Appointment Requests Section -->
    <div class="section-spacing">
        <div class="section-header">
            <h2><i class="fas fa-calendar-check me-2"></i>Appointment Requests</h2>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                <strong>✓ Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card-container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Patient Name</th>
                            <th>Email</th>
                            <th>Date</th>
                            <th>Phone</th>
                            <th>Reason</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($appointments as $appointment)
                        <tr>
                            <td><strong>{{ $appointment->patient_name }}</strong></td>
                            <td>{{ $appointment->patient_email }}</td>
                            <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</td>
                            <td>{{ $appointment->phone_number }}</td>
                            <td>{{ $appointment->reason_for_visit }}</td>
                            <td>
                                <span class="badge badge-{{ $appointment->status == 'pending' ? 'warning' : ($appointment->status == 'accepted' ? 'success' : 'secondary') }}">
                                    {{ ucfirst($appointment->status) }}
                                </span>
                            </td>
                            <td>
                                @if($appointment->status == 'pending')
                                    <form method="POST" action="{{ route('appointment.accept', $appointment->id) }}" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-check me-1"></i>Accept
                                        </button>
                                    </form>
                                    <form method="POST" action="{{ route('appointment.reject', $appointment->id) }}" style="display:inline;">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <i class="fas fa-times me-1"></i>Reject
                                        </button>
                                    </form>
                                @else
                                    <span class="badge badge-secondary">{{ ucfirst($appointment->status) }}</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="empty-state">
                                <i class="fas fa-calendar-times"></i>
                                <p class="mb-0">No appointment requests found</p>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection