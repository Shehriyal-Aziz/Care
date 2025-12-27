@extends('Doctor.headerfooter')

@section('content')
<style>
.table-responsive {
    width: 100%;
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
    margin-bottom: 40px; /* Spacing between tables */
}

.table {
    width: 100%;
    border-collapse: collapse;
    background: #fff;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    border-radius: 8px;
    overflow: hidden;
    margin-top: 30px;
    min-width: 700px; /* Ensures table doesn't shrink too much */
}
.table thead {
    background: linear-gradient(90deg,rgb(111, 255, 44) 0%,rgb(7, 231, 247) 100%);
    color: #fff;
}
.table th, .table td {
    padding: 16px 18px; /* Increased padding for clarity */
    text-align: left;
    border-bottom: 1px solid #f0f0f0;
    transition: background 0.2s;
    white-space: nowrap;
}
.table tbody tr:hover {
    background: #f1f8ff;
    cursor: pointer;
    transition: background 0.2s;
}
.table th {
    font-weight: 600;
    letter-spacing: 1px;
}
.table tr:last-child td {
    border-bottom: none;
}

.availability-table-responsive {
    width: 100%;
    overflow-x: auto;
    margin-top: 20px;
    margin-bottom: 30px; /* Spacing below the availability table */
}

.availability-table {
    width: 100%;
    border-collapse: collapse;
    background: #f9fff9;
    box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    border-radius: 8px;
    overflow: hidden;
    min-width: 500px;
}

.availability-table thead {
    background: linear-gradient(90deg, #00c6ff 0%, #43e97b 100%);
    color: #fff;
}

.availability-table th, .availability-table td {
    padding: 16px 16px; /* Increased padding for clarity */
    text-align: left;
    border-bottom: 1px solid #e0f0e0;
}

.availability-table tbody tr:hover {
    background: #eaffea;
}

.availability-table th {
    font-weight: 600;
    letter-spacing: 1px;
}

.availability-table tr:last-child td {
    border-bottom: none;
}

/* Headings style */
h3 {
    margin-top: 0;
    margin-bottom: 18px;
    padding-left: 2px;
    font-weight: 600;
}

/* Optional: Add a little left/right padding to the containers for better alignment on wide screens */
.table-responsive, .availability-table-responsive {
    padding-left: 8px;
    padding-right: 8px;
}
</style>



<div class="table-responsive" style="margin-top:30px;">
    <table class="table">
        <thead>
            <tr>
                <th>Patient Name</th>
                <th>Email</th>
                <th>Date</th>
                <th>Department</th>
                <th>Phone</th>
                <th>Reason</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{ $appointment->patient_name }}</td>
                <td>{{ $appointment->patient_email }}</td>
                <td>{{ $appointment->appointment_date }}</td>
                <td>{{ $appointment->department }}</td>
                <td>{{ $appointment->phone_number }}</td>
                <td>{{ $appointment->reason_for_visit }}</td>
                <td>{{ $appointment->action }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
<br>
<br>
<br>
<h3>Your Availabilities</h3>
<div class="availability-table-responsive" style="margin-top:20px;">
    <table class="availability-table">
        <thead>
            <tr>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($availabilities as $a)
            <tr>
                <td>{{ $a->day_of_week }}</td>
                <td>{{ $a->start_time }}</td>
                <td>{{ $a->end_time }}</td>
                <td>
                    @if($a->is_available)
                        <span style="color:green;font-weight:bold;">Available</span>
                    @else
                        <span style="color:red;font-weight:bold;">Not Available</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>




@endsection