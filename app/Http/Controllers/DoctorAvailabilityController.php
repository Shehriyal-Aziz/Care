<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DoctorAvailability; // Adjust model name as needed
use Illuminate\Support\Facades\Auth;
use App\Models\MonthlyAppointmentReport;
use App\Models\Appointment;
use Storage;

class DoctorAvailabilityController extends Controller
{
    /**
     * Display the doctor profile
     */
    public function profile()
    {
        $doctor = Auth::user();
        $availabilities = DoctorAvailability::where('doctor_id', Auth::id())
            ->orderByRaw("FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')")
            ->get();

        return view('Doctor.profile', compact('doctor', 'availabilities'));
    }

    /**
     * Update doctor profile
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'specialization' => 'nullable|string|max:255',
            'experience' => 'nullable|string|max:255',
        ]);

        $doctor = Auth::user();
        $doctor->update($request->only(['name', 'email', 'phone', 'specialization', 'experience']));

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    /**
     * Display the availability page
     */
    public function index()
    {
        $availabilities = DoctorAvailability::where('doctor_id', Auth::id())
            ->orderByRaw("FIELD(day_of_week, 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')")
            ->get();

        // Get dismissed appointment IDs from session
        $dismissedIds = session()->get('dismissed_appointments', []);
        
        // Load appointments for this doctor, excluding dismissed ones
        $appointments = \App\Models\Appointment::where('doctor_id', Auth::id())
            ->whereNotIn('id', $dismissedIds) // Exclude dismissed appointments
            ->orderBy('appointment_date', 'desc')
            ->get();

        return view('Doctor.availability', compact('availabilities', 'appointments'));
    }

    /**
     * Dismiss an appointment from view (stores in session)
     */
    public function dismissAppointment(Request $request)
    {
        $appointmentId = $request->input('appointment_id');
        
        // Get current dismissed appointments from session
        $dismissedIds = session()->get('dismissed_appointments', []);
        
        // Add this appointment ID if not already dismissed
        if (!in_array($appointmentId, $dismissedIds)) {
            $dismissedIds[] = $appointmentId;
            session()->put('dismissed_appointments', $dismissedIds);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Appointment dismissed successfully!'
        ]);
    }

    /**
     * Clear all dismissed appointments from session
     */
    public function clearDismissed()
    {
        session()->forget('dismissed_appointments');
        return redirect()->back()->with('success', 'All dismissed appointments restored!');
    }

    /**
     * Store or update availability for multiple days
     */
    public function store(Request $request)
    {
        // Validate the request
        $request->validate([
            'days' => 'required|array|min:1',
            'days.*' => 'required|string|in:Monday,Tuesday,Wednesday,Thursday,Friday,Saturday,Sunday',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $doctorId = Auth::id();
        $startTime = $request->start_time;
        $endTime = $request->end_time;
        // Convert checkbox to boolean (checked = 1, unchecked = 0)
        $isAvailable = $request->has('is_available') ? true : false;

        // Loop through selected days and create/update availability
        foreach ($request->days as $day) {
            DoctorAvailability::updateOrCreate(
                [
                    'doctor_id' => $doctorId,
                    'day_of_week' => $day
                ],
                [
                    'start_time' => $startTime,
                    'end_time' => $endTime,
                    'is_available' => $isAvailable
                ]
            );
        }

        return redirect()->back()->with('success', 'Availability updated successfully for ' . count($request->days) . ' day(s)!');
    }

    /**
     * Delete a specific availability
     */
    public function destroy($id)
    {
        $availability = DoctorAvailability::where('doctor_id', Auth::id())
            ->where('id', $id)
            ->first();

        if ($availability) {
            $availability->delete();
            return redirect()->back()->with('success', 'Availability deleted successfully!');
        }

        return redirect()->back()->with('error', 'Availability not found!');
    }
}