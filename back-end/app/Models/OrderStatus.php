<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'status',
            'created_at',
            'updated_at',
        );
    }

    public function scopePending($query) {
        return $query->where('status', 'Pending');
    }

    public function scopeInReview($query) {
        return $query->where('status', 'In Review');
    }

    public function scopeInProgress($query) {
        return $query->where('status', 'In Progress');
    }

    public function scopeCanceled($query) {
        return $query->where('status', 'Canceled');
    }

    public function scopeOnTheWay($query) {
        return $query->where('status', 'On The Way');
    }

    public function scopeDelivered($query) {
        return $query->where('status', 'Delivered');
    }

    public function shopOrder()
    {
        return $this->hasMany(ShopOrder::class, 'order_status');
    }
}