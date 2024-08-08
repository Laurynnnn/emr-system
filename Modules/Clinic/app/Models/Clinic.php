<?php

namespace Modules\Clinic\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Clinic\Database\Factories\ClinicFactory;
use Modules\Appointment\Models\Appointment;
use Illuminate\Database\Eloquent\SoftDeletes;

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

    // protected static function newFactory(): ClinicFactory
    // {
    //     //return ClinicFactory::new();
    // }
}
