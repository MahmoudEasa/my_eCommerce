<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ar',
        'name_en',
        'description_ar',
        'description_en',
        'discount_rate',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'name_ar',
            'name_en',
            'description_ar',
            'description_en',
            'discount_rate',
            'start_date',
            'end_date',
            'created_at',
            'updated_at',
        );
    }

    public function productCategories()
    {
        return $this->belongsToMany(ProductCategory::class, 'promotion_categories', 'promotion_id', 'category_id');
    }
}