<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'order_code',
        'user_id',
        'total_amount',
        'status',
        'payment_method',
        'customer_name',
        'customer_phone',
        'customer_address',
        'note'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }

    public static function generateOrderCode()
    {
        $prefix = 'PZ';
        $date = now()->format('Ymd');
        $lastOrder = self::whereDate('created_at', today())->latest()->first();
        $number = $lastOrder ? intval(substr($lastOrder->order_code, -3)) + 1 : 1;

        return $prefix . '-' . $date . '-' . str_pad($number, 3, '0', STR_PAD_LEFT);
    }
}
