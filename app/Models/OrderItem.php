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
}
