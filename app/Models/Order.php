<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $fillable = [
        'customer_id',
        'employee_id', // Employee handling the order, if applicable.
        'total_amount',
        'delivery_date',
        'delivery_address',
        'order_date',
        'recipient_name',
        'recipient_phone',
        'status',
        'personalize_msg', // Any special instructions for the order.
        'instructions',
    ];

    protected $casts = [
        'order_date' => 'datetime',
        'delivery_date' => 'date',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'customer_id');
    }
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class, 'order_items', 'order_id', 'order_id');
    }
    public function orderAddOns()
    {
        return $this->hasMany(OrderAddOn::class, 'order_add_ons', 'order_id', 'order_id');
    }


    public function setTotalAmountAttribute($value)
    {
        $this->attributes['total_amount'] = number_format($value, 2, '.', '');
    }
    public function getTotalAmountAttribute($value)
    {
        return number_format($value, 2, '.', '');
    }
}
