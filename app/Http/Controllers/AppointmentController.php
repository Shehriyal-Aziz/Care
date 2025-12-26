<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use  Barryvdh\DomPDF\Facade\Pdf; 


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
        $table->doctor_id = $request->doctor_id;
        $table->status = 'pending'; // Default status
        $table->user_id = Auth::id(); // Assuming the user is authenticated
        $table->save();

        return redirect()->back()->with('success', 'Appointment request submitted successfully!');
    }
  public function viewAllAppointments()
    {
        $appointments = Appointment::get();
        return view('Admin.viewallappointments', compact('appointments'));
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
    public function myappointments()
    {
        $userId = Auth::id();
        $appointments = Appointment::where('user_id', $userId)->get();
        return view('User.myappointments', compact('appointments'));
    }
     public function printpdfdesign()
    {
        $userId = Auth::id();
        $appointments = Appointment::where('user_id', $userId)->get();
        return view('User.pdf', compact('appointments'));
    }
    public function downloadPDF()
    {
        $appointments = Appointment::where('user_id', Auth::id())->get();
        $pdf =  PDF::loadView('User.pdf', compact('appointments'));
        return $pdf->download('receipt.pdf');
    }
   
}
