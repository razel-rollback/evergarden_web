<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOn extends Model
{
    use HasFactory;
    protected $table = 'addons';
    protected $primaryKey = 'add_on_id';
    protected $fillable = [
        'name',
        'description',
        'price',
        'is_active',
    ];
    protected $casts = [
        'is_active' => 'boolean',
        'price' => 'decimal:2',
    ];
    public function orderAddOns()
    {
        return $this->hasMany(OrderAddOn::class, 'add_on_id', 'add_on_id');
    }
    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = number_format($value, 2, '.', '');
    }
    public function getPriceAttribute($value)
    {
        return number_format($value, 2, '.', '');
    }
}
