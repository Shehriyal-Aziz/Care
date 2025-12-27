<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\DoctorMiddleware;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorAvailabilityController;
use App\Models\Appointment;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BranchController;
use Illuminate\Support\Facades\Auth;
use App\Models\cities;
use App\Models\Branch;


// branch controller
Route::post('/get-branches-by-city', [BranchController::class, 'getByCity']);

// user controller
Route::get('/', [UserController::class, 'home'])->name('home'); //will take to home page

Route::post('/get-doctors-by-city', [UserController::class, ('getDoctorByCity')]); //When a city is selected, send me all doctors from that city so I can show them in a dropdown.

Route::post('/get-doctors-by-branch', [UserController::class, 'getDoctorsByBranch']);


// AppointmentController

Route::post('/appointment', [AppointmentController::class, 'store'])->middleware('auth:sanctum')->name('appointment.store'); //
Route::get('/news-details', function () {
    return view('news-detail');
}); 




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {

        if (Auth::user()->role == 'admin') {
            $appointments = Appointment::get();
            return view('Admin.index', compact('appointments'));
        } else if (Auth::user()->role == 'doctor') {
            return redirect('/DoctorDashboard');
        } else {
            return view('profile.show');
        }
    })->name('dashboard');




    Route::get('/applyfordoctor', function () {
        $cities = cities::all();
    $branches = Branch::all(); 
    return view('applyfordoctor', compact('cities','branches'));
    });
    Route::post('requestfordoctor', [UserController::class, 'requestForDoctor'])->name('requestfordoctor');
    Route::get('/myappointments', [AppointmentController::class, ('myappointments')])->name('myappointments');
});


//Admin Middleware Routes
Route::middleware([AdminMiddleware::class])->group(function () {

    Route::get('/alldoctors', function () {
        $doctors = \App\Models\User::where('role', 'doctor')->get();
        return view('Admin.alldoc', compact('doctors'));
    });

    
   
    Route::get('/admin/branches/create', [BranchController::class, 'create'])->name('admin.branches');
Route::post('/admin/branches', [BranchController::class, 'store'])->name('admin.branches.store');


    Route::get('/branches', [AdminController::class, 'getBranches'])
    ->name('admin.branches');



    Route::get('/requestbydoctors', [AdminController::class, 'getdoctors']);

    Route::post('/doctoraccept/{doctor}/', [AdminController::class, 'Doctor_Request_Accept'])->name('doctoraccept');
    Route::post('/doctorreject/{doctor}/', [AdminController::class, 'Doctor_Request_Reject'])->name('doctorreject');

    
    Route::get('/cities', [AdminController::class, 'getCities'])->name('admin.cities');
    Route::post('/addcity', [AdminController::class, 'addcity'])->name('admin.addCity');
    Route::delete('/deleteCity/{city}', [AdminController::class, 'deleteCity'])->name('admin.deleteCity');
});

// doc avial route by auth middleware

// Doctor Routes - Protected by auth middleware
Route::middleware(['auth'])->group(function () {
    
    // Display doctor profile
    Route::get('/doctor/profile', [DoctorAvailabilityController::class, 'profile'])->name('doctor.profile');
    
    // Update doctor profile
    Route::post('/doctor/profile/update', [DoctorAvailabilityController::class, 'updateProfile'])->name('doctor.profile.update');
    
    // Display availability page
    Route::get('/doctor/availability', [DoctorAvailabilityController::class, 'index'])->name('doctor.availability');
    
    // Store/Update availability (handles multiple days)
    Route::post('/doctor/availability', [DoctorAvailabilityController::class, 'store'])->name('doctor.availability.store');
    
    // Delete specific availability
    Route::delete('/doctor/availability/{id}', [DoctorAvailabilityController::class, 'destroy'])->name('doctor.availability.destroy');
    
    // Compile monthly appointment report
    Route::post('/doctor/appointments/compile-monthly', [DoctorAvailabilityController::class, 'compileMonthlyReport']);
    
});
//Doctor Middleware Routes
Route::middleware([DoctorMiddleware::class])->group(function () {


    Route::get('/DoctorDashboard', [DoctorController::class, 'appointmentRequest']);

    
    Route::get('doctor/appointments', [DoctorController::class, 'patients']);


    Route::post('/appointment/accept/{appointment}', [DoctorController::class, 'acceptAppointment'])->name('appointment.accept');
    Route::post('/appointment/reject/{appointment}', [DoctorController::class, 'rejectAppointment'])->name('appointment.reject');
});
