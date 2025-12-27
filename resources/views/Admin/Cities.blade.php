@extends('Admin.headerfooter')
@section('content')
<style>
    .city-management-container {
        background: rgb(243, 244, 246);
        min-height: 100vh;
        padding: 40px 0;
    }

    .page-title {
        color: #2c3e50;
        text-align: center;
        font-size: 2.5rem;
        font-weight: bold;
        margin-bottom: 10px;
        text-shadow: 0 2px 10px rgba(40, 167, 69, 0.2);
    }

    .page-subtitle {
        color: #6c757d;
        text-align: center;
        margin-bottom: 40px;
    }

    /* Add City Card */
    .add-city-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 10px 40px rgba(40, 167, 69, 0.15);
        border: 1px solid rgba(40, 167, 69, 0.2);
        margin-bottom: 40px;
    }

    .add-city-card h3 {
        color: #28a745;
        font-weight: bold;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .add-city-card .form-label {
        color: #2c3e50;
        font-weight: 500;
        margin-bottom: 8px;
    }

    .add-city-card .form-control {
        background-color: #f8f9fa;
        border: 2px solid rgba(40, 167, 69, 0.3);
        border-radius: 10px;
        padding: 12px 15px;
        font-size: 1rem;
        transition: all 0.3s ease;
        color: #2c3e50;
    }

    .add-city-card .form-control:focus {
        background-color: #fff;
        border-color: #28a745;
        box-shadow: 0 0 0 0.2rem rgba(40, 167, 69, 0.25);
    }

    .btn-add-city {
        background: linear-gradient(145deg, #28a745, #218838);
        border: none;
        border-radius: 10px;
        padding: 12px;
        font-size: 1.1rem;
        font-weight: 600;
        color: #fff;
        transition: all 0.3s ease;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.4);
    }

    .btn-add-city:hover {
        background: linear-gradient(145deg, #218838, #1e7e34);
        transform: translateY(-2px);
        box-shadow: 0 6px 20px rgba(40, 167, 69, 0.6);
    }

    /* Cities List Card */
    .cities-list-card {
        background: white;
        border-radius: 16px;
        padding: 30px;
        box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
        border: 1px solid rgba(40, 167, 69, 0.2);
    }

    .cities-list-card h3 {
        color: #28a745;
        font-weight: bold;
        margin-bottom: 25px;
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .badge.bg-danger {
        background-color: #28a745 !important;
    }

    .table-responsive {
        border-radius: 12px;
        overflow: hidden;
    }

    .table {
        margin-bottom: 0;
        background-color: white;
    }

    .table thead {
        background: linear-gradient(145deg, #28a745, #218838);
    }

    .table thead th {
        color: #fff;
        font-weight: 600;
        text-transform: uppercase;
        font-size: 0.9rem;
        letter-spacing: 0.5px;
        border: none;
        padding: 15px;
    }

    .table tbody tr {
        background-color: white;
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: rgba(40, 167, 69, 0.1);
        transform: scale(1.01);
    }

    .table td {
        color: #2c3e50;
        border: 1px solid #dee2e6;
        padding: 15px;
        vertical-align: middle;
    }

    .btn-delete {
        background: linear-gradient(145deg, #dc3545, #c82333);
        border: 2px solid rgba(220, 53, 69, 0.5);
        color: #fff;
        border-radius: 8px;
        padding: 8px 20px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    .btn-delete:hover {
        background: linear-gradient(145deg, #c82333, #bd2130);
        border-color: #dc3545;
        transform: scale(1.05);
        box-shadow: 0 4px 15px rgba(220, 53, 69, 0.5);
    }

    .alert {
        border-radius: 12px;
        border: none;
        padding: 15px 20px;
        font-size: 0.95rem;
        animation: slideIn 0.5s ease;
    }

    .alert-success {
        background: linear-gradient(145deg, #28a745, #218838);
        color: #fff;
        box-shadow: 0 4px 15px rgba(40, 167, 69, 0.3);
    }

    .empty-state {
        text-align: center;
        padding: 60px 20px;
        color: #6c757d;
    }

    .empty-state svg {
        width: 80px;
        height: 80px;
        margin-bottom: 20px;
        opacity: 0.5;
        color: #28a745;
    }

    .empty-state h5 {
        color: #2c3e50;
    }

    .text-warning {
        color: #ffc107 !important;
    }

    @keyframes slideIn {
        from {
            opacity: 0;
            transform: translateY(-20px);
        }
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    /* Responsive */
    @media (max-width: 768px) {
        .page-title {
            font-size: 2rem;
        }

        .add-city-card,
        .cities-list-card {
            padding: 20px;
        }

        .table {
            font-size: 0.9rem;
        }

        .btn-delete {
            padding: 6px 15px;
            font-size: 0.85rem;
        }
    }
</style>

<div class="city-management-container">
    <div class="container">
        <h1 class="page-title">🏙️ City Management</h1>
        <p class="page-subtitle">Add and manage cities in one place</p>

        @if(session('success'))
           <div class="alert alert-success alert-dismissible fade show" role="alert" id="successAlert">
                <strong>✓ Success!</strong> {{ session('success') }}
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="row justify-content-center">
            <div class="col-lg-10">
                <!-- Add City Section -->
                <div class="add-city-card">
                    <h3>
                        <span>➕</span> Add New City
                    </h3>
                    <form action="/addcity" method="POST">
                        @csrf
                        <div class="row align-items-end">
                            <div class="col-md-9 mb-3 mb-md-0">
                                <label for="cityname" class="form-label">City Name</label>
                                <input 
                                    type="text" 
                                    name="cityname" 
                                    id="cityname" 
                                    class="form-control" 
                                    placeholder="Enter city name..." 
                                    required
                                    value="{{ old('cityname') }}">
                                @error('cityname')
                                    <small class="text-warning d-block mt-1">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <button type="submit" class="btn btn-add-city w-100">
                                    Add City
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Cities List Section -->
                <div class="cities-list-card">
                    <h3>
                        <span>📋</span> Cities List
                        <span class="badge bg-danger ms-2">{{ count($cities) }}</span>
                    </h3>

                    @if(count($cities) > 0)
                        <div class="table-responsive">
                            <table class="table table-hover text-center">
                                <thead>
                                    <tr>
                                        <th style="width: 10%">#</th>
                                        <th style="width: 60%">City Name</th>
                                        <th style="width: 30%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cities as $index => $city)
                                        <tr>
                                            <td class="fw-bold">{{ $index + 1 }}</td>
                                            <td class="fs-5 text-start">{{ $city->cityname }}</td>
                                            <td>
                                                <form action="{{ route('admin.deleteCity', $city->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete {{ $city->cityname }}?')" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-delete">
                                                        🗑️ Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="empty-state">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                            </svg>
                            <h5>No Cities Added Yet</h5>
                            <p>Start by adding your first city above</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>


@endsection