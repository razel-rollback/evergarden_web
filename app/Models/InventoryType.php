<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryType extends Model
{
    use HasFactory;

    protected $table = 'inventory_types';
    protected $primaryKey = 'type_id';

    protected $fillable = [
        'name', // Name of the inventory type (e.g., "Raw Material", "Finished Product").
        'description', // Description of the inventory type.
    ];
    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    /**
     * Get the inventory items associated with this inventory type.
     */
    public function inventoryItems()
    {
        return $this->hasMany(InventoryItem::class, 'type_id', 'type_id');
    }
}
