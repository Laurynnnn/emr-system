<?php

namespace Modules\Patient\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Patient\Database\Factories\PatientFactory;
use Modules\Appointment\Models\Appointment;
use Modules\MedicalRecord\Models\MedicalRecord;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\User\Models\User;

class Patient extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'first_name',
        'last_name',
        'gender',
        'date_of_birth',
        'phone_number',
        'next_of_kin_name',
        'next_of_kin_relationship',
        'next_of_kin_phone_number',
    ];

    protected static function boot()
    {
        parent::boot();
        //Put this in observer
        static::creating(function ($model) {
            $model->patient_number = 'SH-' . str_pad(rand(0, 99999), 5, '0', STR_PAD_LEFT); //Generating patient number
        });
    }

    protected $dates = [
        'date_of_birth',
    ];

    public function medicalRecords()
    {
        return $this->hasMany(MedicalRecord::class);
    }

    public function appointments()
    {
        return $this->hasMany(Appointment::class);
    }
    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(User::class, 'updated_by');
    }

    public function deletedBy()
    {
        return $this->belongsTo(User::class, 'deleted_by');
    }

}
