<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class SiteUser extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'mobile',
        'status',
        'photo',
        'remember_token',
        'created_at',
        'updated_at',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'name',
            'email',
            'mobile',
            'status',
            'photo',
            'created_at',
            'updated_at',
        );
    }

    public function scopeActive($query) {
        return $query->where('status', 'Active');
    }

    public function scopeDeactivated($query) {
        return $query->where('status', 'Deactivated');
    }

    public function scopeSuspended($query) {
        return $query->where('status', 'Suspended');
    }

    public function addresses()
    {
        return $this->belongsToMany(Address::class, 'user_addresses', 'user_id', 'address_id');
    }

    public function paymentMethod()
    {
        return $this->hasMany(UserPaymentMethod::class, 'user_id');
    }

    public function shopOrders()
    {
        return $this->hasMany(ShopOrder::class, 'user_id');
    }

    public function shoppingCart()
    {
        return $this->hasMany(ShoppingCart::class, 'user_id');
    }

    public function userOrderReviews()
    {
        return $this->hasMany(UserOrderReview::class, 'user_id');
    }

    public function userVendorReviews()
    {
        return $this->hasMany(UserVendorReview::class, 'user_id');
    }

    public function contacts()
    {
        return $this->hasMany(Content::class, 'user_id');
    }
}