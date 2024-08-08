<?php

namespace Modules\Appointment\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Appointment\Database\Factories\AppointmentFactory;
use Modules\Patient\Models\Patient;
use Modules\User\Models\User;
use Modules\Clinic\Models\Clinic;

class Appointment extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'patient_id',
        'clinic_id',
        'doctor_id',
        'nurse_id',
        'clinical_notes',
        'appointment_date',
        'status',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function clinic()
    {
        return $this->belongsTo(Clinic::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function nurse()
    {
        return $this->belongsTo(User::class, 'nurse_id');
    }

    // protected static function newFactory(): AppointmentFactory
    // {
    //     //return AppointmentFactory::new();
    // }
}
