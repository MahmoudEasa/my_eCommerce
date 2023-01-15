<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentType extends Model
{
    use HasFactory;

    protected $fillable = [
        'value',
        'created_at',
        'updated_at',
    ];

    public function scopeSelection($query) {
        return $query->select(
            'id',
            'value',
            'created_at',
            'updated_at',
        );
    }

    public function paymentMethods()
    {
        return $this->hasMany(UserPaymentMethod::class, 'payment_type_id');
    }
}