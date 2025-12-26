@extends('Admin.headerfooter')
@section('content')

<style>
    .doctors-list-section {
    max-width: 95%;
    margin: 30px auto;
    padding: 20px;
     background: rgb(85, 9, 9);
    box-shadow: 0 0 15px rgba(0,0,0,0.05);
    border-radius: 10px;
    color: white;
}

.doctors-header h2 {
    font-size: 28px;
    color: white;
}

.doctors-table-wrapper {
    overflow-x: auto;
}

.doctors-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 16px;
    min-width: 600px;
}

.doctors-table th,
.doctors-table td {
    border: 1px solid #dee2e6;
    padding: 12px 16px;
    text-align: center;
}

.doctors-table thead {
    background-color:rgb(70, 16, 14);
    color: white;
}

.doctors-table tbody tr:nth-child(even) {
    background-color:rgb(112, 24, 13);
}

/* Responsive tweaks */
@media (max-width: 768px) {
    .doctors-header h2 {
        font-size: 22px;
    }

    .doctors-table {
        font-size: 14px;
        min-width: 100%;
    }
}
</style>

<!-- Content Start -->
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