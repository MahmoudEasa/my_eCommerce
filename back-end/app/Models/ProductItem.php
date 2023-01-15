<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id',
        'price',
        'qty_in_stock',
        'product_image1',
        'product_image2',
        'product_image3',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'product_id',
            'price',
            'qty_in_stock',
            'product_image1',
            'product_image2',
            'product_image3',
            'created_at',
            'updated_at',
        );
    }

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function variationOptions()
    {
        return $this->belongsToMany(VariationOption::class, 'product_configurations', 'product_item_id', 'variation_option_id');
    }

    public function shoppingCarts()
    {
        return $this->belongsToMany(ShoppingCart::class, 'shopping_cart_items', 'product_item_id', 'cart_id');
    }

    public function orderLines()
    {
        return $this->hasMany(OrderLine::class, 'product_item_id');
    }
}