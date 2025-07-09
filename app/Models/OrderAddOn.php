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
        'order_id',
        'add_on_id',
        'quantity',
        'unit_price',
    ];

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function addOn()
    {
        return $this->belongsTo(AddOn::class, 'add_on_id');
    }
}
