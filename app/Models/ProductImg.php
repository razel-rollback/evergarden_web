<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductImg extends Model
{
    //
    use HasFactory;
    protected $table = 'product_imgs'; // Specify the table name if it differs from the model name
    protected $primaryKey = 'img_id'; // Specify the primary key if it differs from the default 'id'
    protected $fillable = [
        'variant_id',
        'img_url',
        'img_alt',
        'is_primary',
        'sort_order'
    ]; // Specify the fillable attributes for mass assignment
    protected $casts = [
        'is_primary' => 'boolean', // Cast is_primary to boolean type
        'sort_order' => 'integer', // Cast sort_order to integer type
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ]; // Cast attributes to specific types
    /**
     * Get the product variant that owns the image.
     */
    public function variant()
    {
        return $this->belongsTo(ProductVariant::class, 'variant_id', 'variant_id');
    }
    /**
     * Scope a query to only include primary images.
     */
    public function scopePrimary($query)
    {
        return $query->where('is_primary', true);
    }
    /**
     * Scope a query to order images by sort order.
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc');
    }
}
