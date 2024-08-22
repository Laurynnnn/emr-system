<?php

namespace Modules\MedicalRecord\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\MedicalRecord\Database\Factories\MedicalRecordFactory;
use Modules\Patient\Models\Patient;
use Modules\User\Models\User;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Lab\Models\LabTest;
use Modules\Diagnosis\Models\Diagnosis;

class MedicalRecord extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'symptoms',
        'lab_tests',
        'medical_diagnoses',
        'treatment_given',
        'outcome',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(User::class, 'doctor_id');
    }

    public function labTests()
    {
        return $this->belongsToMany(LabTest::class);
    }

    public function diagnoses()
    {
        return $this->belongsToMany(Diagnosis::class);
    }

    // protected static function newFactory(): MedicalRecordFactory
    // {
    //     //return MedicalRecordFactory::new();
    // }
}
