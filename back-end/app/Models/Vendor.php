<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Vendor extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'address',
        'city',
        'country',
        'status',
        'photo',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'name',
            'email',
            'mobile',
            'address',
            'city',
            'country',
            'status',
            'photo',
            'created_at',
            'updated_at',
        );
    }

    public function scopeActive($query) {
        return $query->where('status', 'Active');
    }

    public function scopeDeactivated($query) {
        return $query->where('status', 'Deactivated');
    }

    public function scopeSuspended($query) {
        return $query->where('status', 'Suspended');
    }

    public function productCategories()
    {
        return $this->belongsToMany(ProductCategory::class, 'vendor_categories', 'vendor_id', 'category_id');
    }
}