<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\DoctorAvailability;
use Illuminate\Support\Facades\Auth;


class DoctorController extends Controller
{
   
    public function appointmentRequest()
    {
        $appointments = Appointment::where('doctor_id', Auth::user()->id)->get();
        $availabilities = DoctorAvailability::where('doctor_id', Auth::user()->id)->get();
        return view('Doctor.DoctorDashboard', compact('appointments', 'availabilities'));
    }
    public function patients()
    {
        $appointments = Appointment::where('doctor_id', Auth::user()->id)->get();
        return view('Doctor.appointments', compact('appointments',));
    }
    public function profile()
    {
        $doctor = auth()->user();
        return view('Doctor.profile', compact('doctor'));
    }
    public function updateProfile(Request $request)
    {
        $doctor = auth()->user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $doctor->id,
            'phone' => 'nullable|string|max:20',
            'specialization' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            // Add more fields as needed
        ]);

        $doctor->update($request->only(['name', 'email', 'phone', 'specialization', 'experience', 'city']));

        return redirect()->route('doctor.profile')->with('success', 'Profile updated successfully!');
    }
    public function acceptAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'Approved';
        $appointment->save();

        return redirect()->back()->with('success', 'Appointment accepted.');
    }
    public function rejectAppointment($id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->status = 'Rejected';
        $appointment->save();

        return redirect()->back()->with('error', 'Appointment rejected.');
    }
    public function viewAllAppointments()
    {
        $appointments = Appointment::where('doctor_id', Auth::user()->id)->get();
        return view('Doctor.viewAllAppointments', compact('appointments'));
    }
}
