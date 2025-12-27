@extends('Admin.headerfooter')
@section('content')

<style>
    .doctors-list-section {
        max-width: 95%;
        margin: 30px auto;
        padding: 2rem;
        background: linear-gradient(135deg, #f8fff8 0%, #ffffff 100%);
        box-shadow: 0 8px 24px rgba(34, 139, 34, 0.1);
        border-radius: 15px;
        border: 2px solid #90EE90;
        min-height: 100vh;
    }

    .doctors-header h2 {
        font-size: 28px;
        color: #228B22;
        font-weight: 600;
        margin-bottom: 2rem;
        padding-bottom: 1rem;
        border-bottom: 3px solid #90EE90;
    }

    .doctors-table-wrapper {
        overflow-x: auto;
        background-color: white;
        border-radius: 10px;
        padding: 1rem;
    }

    .doctors-table {
        width: 100%;
        border-collapse: collapse;
        font-size: 16px;
        min-width: 600px;
    }

    .doctors-table th,
    .doctors-table td {
        border: 1px solid #90EE90;
        padding: 12px 16px;
        text-align: center;
        color: #2d5016;
    }

    .doctors-table thead {
        background: linear-gradient(135deg, #32CD32 0%, #228B22 100%);
        color: white;
    }

    .doctors-table thead th {
        color: white;
        font-weight: 600;
        border-color: #228B22;
    }

    .doctors-table tbody tr {
        background-color: white;
        transition: all 0.3s ease;
    }

    .doctors-table tbody tr:nth-child(even) {
        background-color: #f9fff9;
    }

    .doctors-table tbody tr:hover {
        background-color: #e8f5e9;
        transform: scale(1.01);
        box-shadow: 0 2px 8px rgba(34, 139, 34, 0.1);
    }

    .text-muted {
        color: #6c757d !important;
        font-style: italic;
    }

    /* Ensure content area has white background */
    .content {
        background-color: #ffffff !important;
    }

    /* Responsive tweaks */
    @media (max-width: 768px) {
        .doctors-list-section {
            padding: 1.5rem;
            margin: 15px auto;
        }

        .doctors-header h2 {
            font-size: 22px;
        }

        .doctors-table {
            font-size: 14px;
            min-width: 100%;
        }

        .doctors-table th,
        .doctors-table td {
            padding: 8px 12px;
        }
    }
</style>

<div class="doctors-list-section">
    <div class="doctors-header text-center mb-4">
        <h2>Doctors List</h2>
    </div>

    <div class="doctors-table-wrapper">
        <table class="doctors-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>City</th>
                    <th>Department</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($doctors as $doctor)
                    <tr>
                        <td>{{ $doctor->name }}</td>
                        <td>{{ $doctor->email }}</td>
                        <td>{{ $doctor->city }}</td>
                        <td>{{ $doctor->specialization ?: 'Not Assigned' }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-center text-muted">No doctors found.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection