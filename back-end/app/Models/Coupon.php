<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        'coupon_no',
        'coupon_discount',
        'start_date',
        'end_date',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'coupon_no',
            'coupon_discount',
            'start_date',
            'end_date',
            'created_at',
            'updated_at',
        );
    }
}