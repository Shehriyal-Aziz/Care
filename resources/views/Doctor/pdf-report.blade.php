<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Monthly Appointment Report</title>
    <style>
        body {
            font-family: 'DejaVu Sans', sans-serif;
            color: #333;
            line-height: 1.6;
        }
        .header {
            text-align: center;
            margin-bottom: 30px;
            padding-bottom: 20px;
            border-bottom: 3px solid #28a745;
        }
        .header h1 {
            color: #28a745;
            margin: 0;
            font-size: 28px;
        }
        .header p {
            margin: 5px 0;
            color: #666;
        }
        .info-box {
            background: #f8f9fa;
            padding: 15px;
            border-radius: 8px;
            margin-bottom: 20px;
        }
        .info-box table {
            width: 100%;
        }
        .info-box td {
            padding: 5px 10px;
        }
        .info-box td:first-child {
            font-weight: bold;
            color: #28a745;
            width: 150px;
        }
        .stats {
            display: table;
            width: 100%;
            margin: 20px 0;
        }
        .stat-box {
            display: table-cell;
            width: 33.33%;
            text-align: center;
            padding: 15px;
            background: #e8f5e9;
            border-radius: 8px;
        }
        .stat-box:nth-child(2) {
            background: #fff3cd;
        }
        .stat-box:nth-child(3) {
            background: #d1ecf1;
        }
        .stat-box h3 {
            margin: 0;
            font-size: 32px;
            color: #28a745;
        }
        .stat-box p {
            margin: 5px 0 0;
            color: #666;
            font-size: 14px;
        }
        .appointments-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        .appointments-table th {
            background: #28a745;
            color: white;
            padding: 12px;
            text-align: left;
            font-weight: bold;
        }
        .appointments-table td {
            padding: 10px 12px;
            border-bottom: 1px solid #ddd;
        }
        .appointments-table tr:nth-child(even) {
            background: #f8f9fa;
        }
        .badge {
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }
        .badge-approved {
            background: #28a745;
            color: white;
        }
        .badge-pending {
            background: #ffc107;
            color: #000;
        }
        .footer {
            margin-top: 40px;
            padding-top: 20px;
            border-top: 2px solid #ddd;
            text-align: center;
            color: #666;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Monthly Appointment Report</h1>
        <p>Doctor: <strong>{{ $doctor->name }}</strong></p>
        <p>Report Period: Last 30 Days ({{ now()->subDays(30)->format('M d, Y') }} - {{ now()->format('M d, Y') }})</p>
        <p>Generated on: {{ now()->format('F d, Y h:i A') }}</p>
    </div>

    <div class="info-box">
        <table>
            <tr>
                <td>Doctor Name:</td>
                <td>{{ $doctor->name }}</td>
            </tr>
            <tr>
                <td>Email:</td>
                <td>{{ $doctor->email }}</td>
            </tr>
            <tr>
                <td>Specialization:</td>
                <td>{{ $doctor->specialization ?? 'N/A' }}</td>
            </tr>
            <tr>
                <td>Report Month:</td>
                <td>{{ now()->format('F Y') }}</td>
            </tr>
        </table>
    </div>

    <div class="stats">
        <div class="stat-box">
            <h3>{{ $appointments->count() }}</h3>
            <p>Total Appointments</p>
        </div>
        <div class="stat-box">
            <h3>{{ $appointments->where('status', 'Approved')->count() }}</h3>
            <p>Approved</p>
        </div>
        <div class="stat-box">
            <h3>{{ $appointments->where('status', 'Not Approved')->count() }}</h3>
            <p>Pending</p>
        </div>
    </div>

    <h2 style="color: #28a745; margin-top: 30px;">Appointment Details</h2>

    <table class="appointments-table">
        <thead>
            <tr>
                <th>Date</th>
                <th>Patient Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Department</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($appointments as $appointment)
            <tr>
                <td>{{ \Carbon\Carbon::parse($appointment->appointment_date)->format('M d, Y') }}</td>
                <td>{{ $appointment->patient_name }}</td>
                <td style="font-size: 11px;">{{ $appointment->patient_email }}</td>
                <td>{{ $appointment->phone_number }}</td>
                <td>{{ $appointment->department }}</td>
                <td>
                    @if($appointment->status == 'Approved')
                        <span class="badge badge-approved">Approved</span>
                    @else
                        <span class="badge badge-pending">Pending</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="footer">
        <p>This is an automatically generated report | Healthcare Management System</p>
        <p>© {{ now()->year }} All Rights Reserved</p>
    </div>
</body>
</html>