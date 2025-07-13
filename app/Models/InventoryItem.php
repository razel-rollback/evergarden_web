<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryItem extends Model
{
    use HasFactory;
    protected $table = 'inventory_items'; // Specify the table name if it differs from the model name
    protected $primaryKey = 'inventory_item_id'; // Specify the primary key if it differs from the default 'id'
    protected $fillable = [
        'name',
        'description',
        'type_id',
        'color',
        'size',
        'unit_of_measurement',
        'is_perishable',
        'current_stock',
        'reorder_level',
        'max_stock',
        'cost_price',
        'supplier',
        'last_restock'
    ];
    protected $casts = [
        'last_restock' => 'date', // Cast last_restock to date type
        'is_perishable' => 'boolean', // Cast is_perishable to boolean type
        'current_stock' => 'decimal:2', // Cast current_stock to decimal with 2 decimal places
        'reorder_level' => 'decimal:2', // Cast reorder_level to decimal with 2 decimal places
        'max_stock' => 'decimal:2', // Cast max_stock to decimal with 2 decimal places
        'cost_price' => 'decimal:2', // Cast cost_price to decimal with 2 decimal places
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function type()
    {
        return $this->belongsTo(InventoryType::class, 'type_id', 'type_id');
    }
    public function components()
    {
        return $this->hasMany(ProductComponent::class, 'inventory_item_id', 'inventory_item_id');
    }
    public function transaction()
    {
        return $this->hasMany(InventoryTransaction::class, 'inventory_item_id', 'inventory_item_id');
    }
}
