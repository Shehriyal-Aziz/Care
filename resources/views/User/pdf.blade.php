<h3>Appointment Reciept</h3>
<hr>
@foreach($appointments as $appointment)
   <table>
    <tr>
        <th>S.No</th>
        <th>Patient Name</th>
        <th>Date</th>
        <th>Phone Number</th>
        <th>Reason for Visit</th>
        <th>Status</th>
        <th>City</th>
        
    </tr>
     <tr>
        <td>{{ $appointment->id }}</td>
        <td>{{ $appointment->patient_name }}</td>
        <td>{{ $appointment->created_at }}</td>
        <td>{{ $appointment->phone_number }}</td>
        <td>{{ $appointment->reason_for_visit }}</td>
        <td>{{ $appointment->status }}</td>
        <td>{{ $appointment->city }}</td>
    </tr>
   </table>

@endforeach