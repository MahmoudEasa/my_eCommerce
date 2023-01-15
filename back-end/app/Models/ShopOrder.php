<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShopOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_no',
        'order_date',
        'order_total',
        'user_id',
        'payment_method_id',
        'shipping_address',
        'shipping_method',
        'order_status',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'order_no',
            'order_date',
            'order_total',
            'user_id',
            'payment_method_id',
            'shipping_address',
            'shipping_method',
            'order_status',
            'created_at',
            'updated_at',
        );
    }

    public function user()
    {
        return $this->belongsTo(SiteUser::class, 'user_id');
    }

    public function userPaymentMethod()
    {
        return $this->belongsTo(UserPaymentMethod::class, 'payment_method_id');
    }

    public function shippingAddress()
    {
        return $this->belongsTo(Address::class, 'shipping_address');
    }

    public function shippingMethod()
    {
        return $this->belongsTo(ShippingMethod::class, 'shipping_method');
    }

    public function orderStatus()
    {
        return $this->belongsTo(OrderStatus::class, 'order_status');
    }

    public function orderLines()
    {
        return $this->hasMany(OrderLine::class, 'order_id');
    }
}