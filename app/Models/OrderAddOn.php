<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderAddOn extends Model
{
    use HasFactory;
    protected $table = 'order_add_ons';
    protected $primaryKey = 'id';

    protected $fillable = [
        'order_items_id',
        'add_on_id',
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
    public function orderItem()
    {
        return $this->belongsTo(OrderItem::class, 'order_items_id', 'order_item_id');
    }
    public function addOn()
    {
        return $this->belongsTo(AddOn::class, 'add_on_id', 'add_on_id');
    }
    public function getFormattedUnitPriceAttribute()
    {
        return number_format($this->unit_price, 2);
    }
    public function getFormattedQuantityAttribute()
    {
        return number_format($this->quantity, 2);
    }
}
