<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOn extends Model
{
    use HasFactory;
    protected $table = 'add_ons';
    protected $primaryKey = 'add_on_id';
    protected $fillable = [
        'name',
        'add_on_type_id',
        'price',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    /**
     * Get the add-on type associated with this add-on.
     */
    public function addOnType()
    {
        return $this->belongsTo(AddOnType::class, 'add_on_type_id', 'add_on_type_id');
    }
    public function orderItems()
    {
        return $this->belongsToMany(OrderItem::class, 'order_add_ons', 'add_on_id', 'order_item_id')
            ->withPivot('quantity', 'unit_prices')
            ->withTimestamps();
    }
}
