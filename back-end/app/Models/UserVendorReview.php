<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserVendorReview extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'vendor_id',
        'rating_value',
        'comment',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'user_id',
            'vendor_id',
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

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }
}