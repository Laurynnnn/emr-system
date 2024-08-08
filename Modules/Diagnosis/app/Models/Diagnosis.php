<?php

namespace Modules\Diagnosis\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Diagnosis\Database\Factories\DiagnosisFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\MedicalRecord\Models\MedicalRecord;

class Diagnosis extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'medical_record_id',
        'name',
        'icd_code',
        'is_primary',
    ];

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }

    // protected static function newFactory(): DiagnosisFactory
    // {
    //     //return DiagnosisFactory::new();
    // }
}
