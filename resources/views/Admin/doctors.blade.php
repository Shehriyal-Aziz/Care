@extends('Admin.headerfooter')
@section('content')

<style>
    .doctor-section {
        padding: 2rem;
        background-color: #ffffff;
        min-height: 100vh;
    }

    .doctor-section h3 {
        color: #228B22;
        font-weight: 600;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid #90EE90;
    }

    /* Ensure content area has white background */
    .content {
        background-color: #ffffff !important;
    }

    .doctor-table-wrapper {
        border-radius: 15px;
        overflow-x: auto;
        background: linear-gradient(135deg, #f8fff8 0%, #ffffff 100%);
        padding: 2rem;
        box-shadow: 0 8px 24px rgba(34, 139, 34, 0.1);
        border: 2px solid #90EE90;
    }

    .table-header {
        background: linear-gradient(135deg, #32CD32 0%, #228B22 100%) !important;
        color: white !important;
    }

    .table-header th {
        color: white !important;
        font-weight: 600;
        padding: 1rem;
        border: none;
    }

    .table th,
    .table td {
        vertical-align: middle;
        padding: 1rem;
        color: #2d5016;
        border-bottom: 1px solid #90EE90;
    }

    .table tbody tr {
        transition: all 0.3s ease;
        background-color: white;
    }

    .table tbody tr:hover {
        background-color: #f9fff9;
        transform: scale(1.01);
        box-shadow: 0 2px 8px rgba(34, 139, 34, 0.1);
    }

    .badge {
        font-size: 14px;
        padding: 8px 16px;
        border-radius: 20px;
        font-weight: 500;
    }

    .bg-success {
        background: linear-gradient(135deg, #32CD32 0%, #228B22 100%) !important;
    }

    .bg-danger {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%) !important;
    }

    .bg-secondary {
        background: linear-gradient(135deg, #6c757d 0%, #5a6268 100%) !important;
    }

    .btn-outline-secondary {
        border: 2px solid #90EE90;
        color: #228B22;
        background-color: white;
        border-radius: 8px;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
        font-weight: 500;
    }

    .btn-outline-secondary:hover {
        background-color: #228B22;
        border-color: #228B22;
        color: white;
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(34, 139, 34, 0.3);
    }

    .btn-primary {
        background: linear-gradient(135deg, #32CD32 0%, #228B22 100%) !important;
        border: none !important;
        color: white;
        padding: 0.5rem 1.25rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(34, 139, 34, 0.3);
    }

    .btn-primary:hover {
        background: linear-gradient(135deg, #228B22 0%, #1a6b1a 100%) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(34, 139, 34, 0.4);
    }

    .btn-danger {
        background: linear-gradient(135deg, #dc3545 0%, #c82333 100%) !important;
        border: none !important;
        color: white;
        padding: 0.5rem 1.25rem;
        border-radius: 8px;
        font-weight: 500;
        transition: all 0.3s ease;
        box-shadow: 0 2px 8px rgba(220, 53, 69, 0.3);
    }

    .btn-danger:hover {
        background: linear-gradient(135deg, #c82333 0%, #bd2130 100%) !important;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(220, 53, 69, 0.4);
    }

    /* Success Alert */
    .alert-success {
        background: linear-gradient(135deg, #90EE90 0%, #98FB98 100%);
        border: 2px solid #32CD32;
        border-radius: 10px;
        color: #1a5010;
        padding: 1rem 1.5rem;
        margin-bottom: 2rem;
        box-shadow: 0 4px 12px rgba(34, 139, 34, 0.15);
    }

    .alert-success strong {
        color: #228B22;
        font-weight: 600;
    }

    .alert-success .btn-close {
        filter: invert(29%) sepia(89%) saturate(1000%) hue-rotate(90deg);
        opacity: 0.7;
        transition: opacity 0.3s ease;
    }

    .alert-success .btn-close:hover {
        opacity: 1;
    }

    /* Responsive improvements */
    @media (max-width: 768px) {
        .doctor-section {
            padding: 1rem;
        }

        .doctor-table-wrapper {
            padding: 1rem;
        }

        .table th,
        .table td {
            font-size: 14px;
            padding: 0.75rem;
        }

        .btn-sm {
            margin-top: 5px;
            width: 100%;
        }

        .doctor-section h3 {
            font-size: 1.5rem;
        }
    }
</style>

<div class="doctor-section">
    <h3 class="text-center">Our Doctors</h3>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
            <strong>✓ Success!</strong> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive doctor-table-wrapper">
        <table class="table table-striped text-center align-middle">
            <thead class="table-header">
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Approved On</th>
                    <th>View CV</th>
                    <th>Status</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody>
                @foreach($doctors as $doctor)
                <tr>
                    <td>{{ $doctor->id }}</td>
                    <td>{{ $doctor->name }}</td>
                    <td>{{ $doctor->email }}</td>
                    <td>{{ \Carbon\Carbon::parse($doctor->created_at)->format('d M Y') }}</td>
                    <td>
                        <a href="{{ asset('uploads/doctorcvs/' . $doctor->cv) }}" target="_blank" class="btn btn-sm btn-outline-secondary">
                            View CV
                        </a>
                    </td>
                    <td>
                        <span class="badge bg-{{ $doctor->doctorstatus === 'approved' ? 'success' : ($doctor->doctorstatus === 'rejected' ? 'danger' : 'secondary') }}">
                            {{ ucfirst($doctor->doctorstatus) }}
                        </span>
                    </td>
                    <td>
                        <form action="/doctoraccept/{{ $doctor->id }}" method="POST" class="d-inline-block">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-primary">Accept</button>
                        </form>
                        <form action="/doctorreject/{{ $doctor->id }}" method="POST" class="d-inline-block ms-1">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-danger">Reject</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection