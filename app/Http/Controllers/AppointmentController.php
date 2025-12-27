<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;


class AppointmentController extends Controller
{
    //
   
    public function store(Request $request)
    {
        $request->validate([
            'patient_name'      => 'required|string|max:255',
            'patient_email'     => 'required|email',
            'appointment_date'  => 'required|date',
            'phone_number'      => 'required|string|max:20',
            'reason_for_visit'  => 'nullable|string',
            'city'             => 'required|string|max:100',
            'doctor_id'            => 'required|exists:users,id',
           
        ]);

        $table = new Appointment();
        $table->patient_name = $request->patient_name;
        $table->patient_email = $request->patient_email;
        $table->appointment_date = $request->appointment_date;
        $table->phone_number = $request->phone_number;
        $table->reason_for_visit = $request->reason_for_visit;
        $table->city = $request->city;
        $table->branch_id = $request->branch_id;
        $table->doctor_id = $request->doctor_id;
        $table->status = 'pending'; 
        $table->user_id = Auth::id(); 
        $table->save();

        return redirect()->back()->with('success', 'Appointment request submitted successfully!');
    }
 
    public function approveAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'approved';
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment approved successfully!');
    }
    public function rejectAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'rejected';
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment rejected successfully!');
    }
   
}
