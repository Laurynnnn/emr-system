<?php

namespace Modules\User\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Modules\User\Database\Factories\PermissionFactory;

class Permission extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [];

    // public function category()
    // {
    //     return $this->belongsTo(PermissionCategory::class, 'category_id');
    // }

    // protected static function newFactory(): PermissionFactory
    // {
    //     //return PermissionFactory::new();
    // }
}
