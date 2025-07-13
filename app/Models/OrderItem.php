<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;
    protected $table = 'order_items';
    protected $primaryKey = 'order_item_id';

    protected $fillable = [
        'order_id',
        'variant_id',
        'quantity',
        'unit_price',
    ];
    protected $casts = [
        'quantity' => 'decimal:2', // Cast quantity to decimal with 2 decimal places
        'unit_price' => 'decimal:2', // Cast unit_price to decimal with 2 decimal places
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    /**
     * Get the order that owns the order item.
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id', 'order_id');
    }
    /**
     * Get the product variant associated with the order item.
     */
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id', 'variant_id');
    }

    public function addOns()
    {
        return $this->hasMany(OrderAddOn::class, 'order_items_id', 'order_item_id');
    }
}
