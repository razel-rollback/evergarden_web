<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InventoryTransaction extends Model
{
    //
    use HasFactory;
    protected $table = 'inventory_transactions'; // Specify the table name if it differs from the model name
    protected $primaryKey = 'transaction_id'; // Specify the primary key if it differs from the default 'id'
    protected $fillable = [
        'inventory_item_id',
        'quantity',
        'transaction_type',
        'cost',
        'reference_id',
        'transaction_date',
        'employee_id',
        'notes'
    ]; // Specify the fillable attributes for mass assignment
    protected $casts = [
        'transaction_date' => 'date', // Cast transaction_date to date type
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ]; // Cast attributes to specific types
    /**
     * Get the inventory item that owns the transaction.
     */
    public function inventoryItem()
    {
        return $this->belongsTo(InventoryItem::class, 'inventory_item_id', 'inventory_item_id');
    }
    /**
     * Get the employee that performed the transaction.
     */
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id', 'employee_id');
    }
}
