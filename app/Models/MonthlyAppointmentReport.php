<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MonthlyAppointmentReport extends Model
{
    protected $fillable = [
        'doctor_id',
        'month',
        'total_appointments',
        'approved_appointments',
        'pending_appointments',
        'pdf_path',
        'appointment_ids',
    ];

    protected $casts = [
        'appointment_ids' => 'array',
    ];

    /**
     * Get the doctor that owns the report
     */
    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }
}