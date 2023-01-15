<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserOrderReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ordered_product_id',
        'rating_value',
        'comment',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'user_id',
            'ordered_product_id',
            'rating_value',
            'comment',
            'created_at',
            'updated_at',
        );
    }

    public function user()
    {
        return $this->belongsTo(SiteUser::class, 'user_id');
    }

    public function orderLine()
    {
        return $this->belongsTo(OrderLine::class, 'ordered_product_id');
    }
}