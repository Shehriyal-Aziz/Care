@extends('Admin.headerfooter')
@section('content')

<style>
    .doctor-table-wrapper {
    border-radius: 10px;
    overflow-x: auto;
    background: rgb(85, 9, 9);
    padding: 20px;
    box-shadow: 0 2px 10px rgba(0,0,0,0.05);
}

.table-header {
    background-color: maroon !important;
    color: white;
}

.table th,
.table td {
    vertical-align: middle;
    padding: 12px;
    color: white;
}

.badge {
    font-size: 14px;
    padding: 6px 12px;
    border-radius: 20px;
}

/* Responsive improvements */
@media (max-width: 768px) {
    .doctor-table-wrapper {
        padding: 10px;
    }

    .table th,
    .table td {
        font-size: 14px;
        padding: 8px;
    }

    .btn-sm {
        margin-top: 5px;
        width: 100%;
    }
}
</style>
<div class="container my-4">
    <h3 class="text-center mb-4">Our Doctors</h3>
<!-- new -->
  
       @if(session('success'))
           <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                <strong>✓ Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
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