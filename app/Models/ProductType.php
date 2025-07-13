<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    use HasFactory;
    protected $table = 'product_types'; // Specify the table name if it differs from the model name
    protected $primaryKey = 'product_type_id'; // Specify the primary key if it differs from the default 'id'
    protected $fillable = ['name']; // Specify the fillable attributes for mass assignment

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ]; // Cast attributes to specific types

    /**
     * Get the products associated with this product type.
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'product_type_id', 'product_type_id');
    }
}
