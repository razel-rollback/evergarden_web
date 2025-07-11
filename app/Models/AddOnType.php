<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddOnType extends Model
{
    //
    use HasFactory;

    protected $table = 'add_on_types'; // Specify the table name if it differs from the model name
    protected $primaryKey = 'add_on_type_id'; // Specify the primary key if it differs from the default 'id'
    protected $fillable = [
        'name',
        'description',
        'is_active',
    ]; // Specify the fillable attributes for mass assignment
    protected $casts = [
        'is_active' => 'boolean',
    ]; // Cast attributes to specific types
    public function addOns()
    {
        return $this->hasMany(AddOn::class, 'add_on_type_id', 'add_on_type_id');
    }
}
