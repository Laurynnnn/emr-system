<?php

namespace Modules\Clinic\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Clinic\Database\Factories\ClinicFactory;
use Modules\Appointment\Models\Appointment;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\User\Models\User;

class Clinic extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
    ];

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

    // protected static function newFactory(): ClinicFactory
    // {
    //     //return ClinicFactory::new();
    // }
}
