<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;
    protected $table = 'products';
    protected $primaryKey = 'product_id';
    protected $fillable = [
        'name',
        'description',
        'base_price',
        'product_type_id',
        'stock',
        'is_available',
    ];
    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    protected $casts = [
        'is_available' => 'boolean',
        'base_price' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
    public function categories()
    {
        return $this->belongsToMany(Category::class, 'product_categories', 'product_id', 'category_id');
    }

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class, 'order_items', 'product_id', 'product_id');
    }
    public function components()
    {
        return $this->hasMany(ProductComponent::class, 'product_id', 'product_id');
    }
}
