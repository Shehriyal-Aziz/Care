@extends('Admin.headerfooter')
@section('content')

<style>
  .container {
      max-width: 1200px;
      margin: 0 auto;
      padding: 20px;
      
        
  }
  .approved-doctors-section {
    max-width: 95%;
    margin: 40px auto;
    padding: 20px;
    background-color:rgb(77, 10, 10);
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.05);
    
}

.section-header h2 th{
    font-size: 28px;
    color:rgb(255, 255, 255);
    margin-bottom: 20px;
}

.table-wrapper {
    overflow-x: auto;
}

.approved-doctors-table {
    width: 100%;
    border-collapse: collapse;
    font-size: 16px;
    min-width: 600px;
    text-align: center;
}

.approved-doctors-table thead {
    background-color: rgb(78, 18, 18);
    color: white;
}

.approved-doctors-table th,
.approved-doctors-table td {
    border: 1px solid #dee2e6;
    padding: 12px 16px;
    color: white;
}

.approved-doctors-table tbody tr:nth-child(even) {
    background-color:rgb(78, 18, 18);
}

/* Responsive tweaks */
@media (max-width: 768px) {
    .section-header h2 {
        font-size: 22px;
    }

    .approved-doctors-table {
        font-size: 14px;
        min-width: 100%;
    }
}
</style>
<div class="approved-doctors-section">
    <div class="section-header text-center">
        <h2>Approved Doctors</h2>
    </div>

    @if($doctors->count())
        <div class="table-wrapper">
            <table class="approved-doctors-table">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Specialization</th>
                        <th>City</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($doctors as $doctor)
                        <tr>
                            <td>{{ $doctor->name }}</td>
                            <td>{{ $doctor->email }}</td>
                            <td>{{ $doctor->specialization }}</td>
                            <td>{{ $doctor->city }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p class="text-center text-muted">No approved doctors found.</p>
    @endif
</div>
@endsection