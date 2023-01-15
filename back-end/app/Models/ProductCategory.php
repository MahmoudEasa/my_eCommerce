<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    use HasFactory;


    protected $fillable = [
        'parent_category_id',
        'name_ar',
        'name_en',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'parent_category_id',
            'name_ar',
            'name_en',
            'created_at',
            'updated_at',
        );
    }

    public function scopeParentCategories($query)
    {
        return $query->where('parent_category_id', 0);
    }

    public function childrenCategory()
    {
        return $this->belongsTo(self::class, 'parent_category_id');
    }

    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

    public function variations()
    {
        return $this->hasMany(Variation::class, 'category_id');
    }

    public function vendors()
    {
        return $this->belongsToMany(Vendor::class, 'vendor_categories', 'vendor_id', 'category_id');
    }

    public function promotions()
    {
        return $this->belongsToMany(Promotion::class, 'promotion_categories', 'promotion_id', 'category_id');
    }
}