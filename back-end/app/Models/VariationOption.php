<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VariationOption extends Model
{
    use HasFactory;

    protected $fillable = [
        'value_ar',
        'value_en',
        'variation_id',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'value_ar',
            'value_en',
            'variation_id',
            'created_at',
            'updated_at',
        );
    }

    public function variationName()
    {
        return $this->belongsTo(Variation::class, 'variation_id');
    }

    public function variationOptions()
    {
        return $this->belongsToMany(ProductItem::class, 'product_configurations', 'product_item_id', 'variation_option_id');
    }
}