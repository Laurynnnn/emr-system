<?php

namespace Modules\Lab\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Lab\Database\Factories\LabTestFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\MedicalRecord\Models\MedicalRecord;

class LabTest extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'duration',
        'results',
    ];

    public function medicalRecord()
    {
        return $this->belongsToMany(MedicalRecord::class);
    }

    // protected static function newFactory(): LabTestFactory
    // {
    //     //return LabTestFactory::new();
    // }
}
