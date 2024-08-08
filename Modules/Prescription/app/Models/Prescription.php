<?php

namespace Modules\Prescription\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Prescription\Database\Factories\PrescriptionFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\MedicalRecord\Models\MedicalRecord;
use Modules\Pharmacy\Models\Drug;

class Prescription extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'medical_record_id',
        'drug_id',
        'instructions',
    ];

    public function medicalRecord()
    {
        return $this->belongsTo(MedicalRecord::class);
    }

    public function drug()
    {
        return $this->belongsTo(Drug::class);
    }

    // protected static function newFactory(): PrescriptionFactory
    // {
    //     //return PrescriptionFactory::new();
    // }
}
