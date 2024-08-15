<?php

namespace Modules\Lab\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Lab\Database\Factories\LabTestFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\MedicalRecord\Models\MedicalRecord;
use Modules\User\Models\User;

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

    // protected static function newFactory(): LabTestFactory
    // {
    //     //return LabTestFactory::new();
    // }
}
