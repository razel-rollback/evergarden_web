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
}
