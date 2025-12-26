<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = [
   
        'patient_name',
        'patient_email',
        'phone_number',
        'appointment_date',
        'reason_for_visit',
        'department',
        'city',
        'branch_id',
        'doctor_id',
        'status',
        
       
        
    ];

}
