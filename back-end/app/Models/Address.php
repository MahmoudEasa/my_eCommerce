<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = [
        'unit_number',
        'street_number',
        'address_line1',
        'address_line2',
        'city',
        'region',
        'postal_code',
        'country',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'unit_number',
            'street_number',
            'address_line1',
            'address_line2',
            'city',
            'region',
            'postal_code',
            'country',
            'created_at',
            'updated_at',
        );
    }

    public function users()
    {
        return $this->belongsToMany(SiteUser::class, 'user_addresses', 'user_id', 'address_id');
    }

    public function shopOrder()
    {
        return $this->hasMany(ShopOrder::class, 'shipping_address');
    }
}