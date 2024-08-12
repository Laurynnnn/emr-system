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
        'name',
        'icd11_code',
    ];

    public function medicalRecord()
    {
        return $this->belongsToMany(MedicalRecord::class);
    }

    // protected static function newFactory(): DiagnosisFactory
    // {
    //     //return DiagnosisFactory::new();
    // }
}
