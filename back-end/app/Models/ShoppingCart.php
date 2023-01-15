<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShoppingCart extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'user_id',
            'created_at',
            'updated_at',
        );
    }

    public function user()
    {
        return $this->belongsTo(SiteUser::class, 'user_id');
    }

    public function productItems()
    {
        return $this->belongsToMany(ProductItem::class, 'shopping_cart_items', 'product_item_id', 'cart_id');
    }
}