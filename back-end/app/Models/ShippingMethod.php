<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShippingMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'name',
            'price',
            'created_at',
            'updated_at',
        );
    }

    public function shopOrder()
    {
        return $this->hasMany(ShopOrder::class, 'shipping_method');
    }
}