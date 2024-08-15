<?php

namespace Modules\Pharmacy\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\Pharmacy\Database\Factories\DrugFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Prescription\Models\Prescription;
use Modules\User\Models\User;

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

    // protected static function newFactory(): DrugFactory
    // {
    //     //return DrugFactory::new();
    // }
}
