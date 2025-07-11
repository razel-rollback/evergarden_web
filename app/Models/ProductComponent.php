<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductComponent extends Model
{
    use HasFactory;
    protected $table = 'product_components';
    protected $fillable = [
        'variant_id',
        'inventory_item_id',
        'color',
        'size',
        'quantity',
        'notes'
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'quantity' => 'decimal:2', // Cast quantity to decimal with 2 decimal places
        'created_at' => 'datetime',
        'updated_at' => 'datetime',

    ];
}
