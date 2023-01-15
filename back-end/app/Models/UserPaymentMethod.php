<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPaymentMethod extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'payment_type_id',
        'provider',
        'account_number',
        'expire_date',
        'is_default',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'user_id',
            'payment_type_id',
            'provider',
            'account_number',
            'expire_date',
            'is_default',
            'created_at',
            'updated_at',
        );
    }

    public function user()
    {
        return $this->belongsTo(SiteUser::class, 'user_id');
    }

    public function paymentType()
    {
        return $this->belongsTo(PaymentType::class, 'payment_type_id');
    }

    public function shopOrders()
    {
        return $this->hasMany(ShopOrder::class, 'payment_method_id');
    }

    public function scopeDefault($query)
    {
        return $query->where('is_default', 1);
    }
}