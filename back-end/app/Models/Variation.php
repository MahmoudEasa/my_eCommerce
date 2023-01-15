<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Variation extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'category_id',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'name_ar',
            'name_en',
            'category_id',
            'created_at',
            'updated_at',
        );
    }

    public function product()
    {
        return $this->belongsTo(ProductCategory::class, 'category_id');
    }

    public function variationValue()
    {
        return $this->hasMany(VariationOption::class, 'variation_id');
    }
}