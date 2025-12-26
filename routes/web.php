<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\DoctorMiddleware;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
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
Route::get('/', [UserController::class, 'home']); //will take to home page

Route::post('/get-doctors-by-city', [UserController::class, ('getdoctorsoncity')]); //When a city is selected, send me all doctors from that city so I can show them in a dropdown.
// change
Route::post('/get-doctors-by-branch', [UserController::class, 'getDoctorsByBranch']);


// AppointmentController

Route::post('/appointment', [AppointmentController::class, 'store'])->middleware('auth:sanctum')->name('appointment.store'); //
Route::get('/viewallappointments', [AppointmentController::class, 'viewAllAppointments'])->name('view.all.appointments');
Route::get('/news-details', function () {
    return view('news-detail');
}); //news page redirect




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
            return view('dashboard');
        }
    })->name('dashboard');




    Route::get('/becomeadoctor', function () {
        $cities = cities::all();
    $branches = Branch::all(); // pass branches
    return view('becomeadoctor', compact('cities','branches'));
    });
    Route::post('requestfordoctor', [UserController::class, 'requestForDoctor'])->name('requestfordoctor');
    Route::get('/myappointments', [AppointmentController::class, ('myappointments')])->name('myappointments');
    Route::get('/downloadPDF', [AppointmentController::class, ('downloadPDF')])->name('downloadPDF');
});


//Admin Middleware Routes
Route::middleware([AdminMiddleware::class])->group(function () {

    Route::get('/alldoctors', function () {
        $doctors = \App\Models\User::where('role', 'doctor')->get();
        return view('Admin.alldoc', compact('doctors'));
    });

    // new
   
    Route::get('/admin/branches/create', [BranchController::class, 'create'])->name('admin.branches');
Route::post('/admin/branches', [BranchController::class, 'store'])->name('admin.branches.store');


    Route::get('/branches', [AdminController::class, 'getBranches'])
    ->name('admin.branches');



    Route::get('/doctors', [AdminController::class, 'getdoctors']);

    Route::post('/doctoraccept/{doctor}/', [AdminController::class, 'doctorAccept'])->name('doctoraccept');
    Route::post('/doctorreject/{doctor}/', [AdminController::class, 'doctorReject'])->name('doctorreject');

    Route::get('/approveddoctors', [AdminController::class, 'approvedDoctors'])->name('approveddoctors');
    // nwe
    Route::get('/cities', [AdminController::class, 'getCities'])->name('admin.cities');
    Route::post('/addcity', [AdminController::class, 'addcity'])->name('admin.addCity');
    Route::delete('/deleteCity/{city}', [AdminController::class, 'deleteCity'])->name('admin.deleteCity');
});

//Doctor Middleware Routes
Route::middleware([DoctorMiddleware::class])->group(function () {
    Route::get('/DoctorDashboard', [DoctorController::class, 'appointmentRequest']);
    Route::post('/doctor/availability', [DoctorController::class, 'store']);




    Route::get('/doctor/profile', [DoctorController::class, 'profile'])->name('doctor.profile');
    Route::post('/doctor/profile', [DoctorController::class, 'updateProfile'])->name('doctor.profile.update');
    Route::post('/appointment/accept/{appointment}', [DoctorController::class, 'acceptAppointment'])->name('appointment.accept');
    Route::post('/appointment/reject/{appointment}', [DoctorController::class, 'rejectAppointment'])->name('appointment.reject');
});
