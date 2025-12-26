<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\cities;
use App\Models\Appointment;

class AdminController extends Controller
{
    //
 public function getCities()
{
    $cities = cities::orderBy('created_at', 'desc')->get();
    return view('Admin.cities', compact('cities'));
}

/**
 * Add a new city
 */
public function addcity(Request $request)
{
    // Validate the input
    $request->validate([
        'cityname' => 'required|string|max:255|unique:cities,cityname'
    ], [
        'cityname.required' => 'City name is required',
        'cityname.unique' => 'This city already exists'
    ]);

    // Create new city
    $city = new cities();
    $city->cityname = $request->cityname;
    $city->save();

    return redirect()->route('admin.cities')->with('success', 'City "' . $request->cityname . '" has been added successfully!');
}

/**
 * Delete a city
 */
public function deleteCity($id)
{
    $city = cities::findOrFail($id);
    $cityName = $city->cityname;
    $city->delete();
    
    return redirect()->back()->with('success', 'City "' . $cityName . '" has been deleted successfully!');
}






    public function getdoctors()
    {
        $doctors = User::where('role', 'Requested to become a doctor')->get();
        return view('Admin.doctors', compact('doctors'));
    }
  public function doctorAccept($doctor)
  {
     $doc = User::find($doctor);
     $doc->doctorstatus = 'accepted';
        $doc->role = 'doctor';
        $doc->save();

     return redirect()->back()->with('success', 'Doctor request accepted successfully.');
  }
  public function doctorReject($doctor)
  {
     $doc = User::find($doctor);
     $doc->doctorstatus = 'rejected';
        $doc->role = 'user';
        $doc->save();

     return redirect()->back()->with('success', 'Doctor request rejected successfully.');
  }
  public function approvedDoctors()
  {
    $doctors = User::where('role', 'doctor')->get();
    return view('Admin.approveddoctors', compact('doctors'));
  }



}
