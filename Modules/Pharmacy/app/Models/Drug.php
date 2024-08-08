<?php

namespace Modules\Pharmacy\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pharmacy\Database\Factories\DrugFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Prescription\Models\Prescription;

class Drug extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'name',
        'brand_name',
        'form',
        'code',
    ];

    public function prescriptions()
    {
        return $this->hasMany(Prescription::class);
    }

    // protected static function newFactory(): DrugFactory
    // {
    //     //return DrugFactory::new();
    // }
}
