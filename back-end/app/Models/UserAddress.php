<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'address_id',
        'is_default',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'user_id',
            'address_id',
            'is_default',
            'created_at',
            'updated_at',
        );
    }

    public function scopeDefault($query)
    {
        return $query->where('is_default', 1);
    }

    public function user()
    {
        return $this->belongsTo(SiteUser::class, 'user_id');
    }

    public function address()
    {
        return $this->belongsTo(Address::class, 'address_id');
    }
}