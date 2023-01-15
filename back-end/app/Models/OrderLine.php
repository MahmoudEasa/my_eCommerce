<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderLine extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_item_id',
        'order_id',
        'qty',
        'price',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'product_item_id',
            'order_id',
            'qty',
            'price',
            'created_at',
            'updated_at',
        );
    }

    public function productItem()
    {
        return $this->belongsTo(ProductItem::class, 'product_item_id');
    }

    public function shopOrder()
    {
        return $this->belongsTo(ShopOrder::class, 'order_id');
    }

    public function userOrderReview()
    {
        return $this->hasMany(UserOrderReview::class, 'ordered_product_id');
    }
}