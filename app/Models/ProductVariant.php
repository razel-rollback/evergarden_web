<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductVariant extends Model
{
    //
    use HasFactory;
    protected $table = 'product_variants'; // Specify the table name if it differs from the model name
    protected $primaryKey = 'variant_id'; // Specify the primary key if it differs from the default 'id'
    protected $fillable = [
        'product_id',
        'size',
        'color',
        'price',
        'is_active'
    ]; // Specify the fillable attributes for mass assignment
    protected $casts = [
        'price' => 'decimal:2', // Cast price to decimal with 2 decimal places
        'is_active' => 'boolean', // Cast is_active to boolean
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ]; // Cast attributes to specific types
    /**
     * Get the product that owns the variant.
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id');
    }
    public function orderitems()
    {
        return $this->hasMany(OrderItem::class, 'variant_id', 'variant_id');
    }
    public function components()
    {
        return $this->hasMany(ProductComponent::class, 'variant_id', 'variant_id');
    }
    public function images()
    {
        return $this->hasMany(ProductImg::class, 'variant_id', 'variant_id');
    }
}
