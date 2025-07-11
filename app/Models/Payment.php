<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    //
    use HasFactory;
    protected $table = 'payments'; // Specify the table name if it differs from the model name
    protected $primaryKey = 'payment_id'; // Specify the primary key if it differs from the default 'id'
    protected $fillable = [
        'order_id',
        'amount',
        'payment_method',
        'status',
        'payment_date',
    ]; // Specify the fillable attributes for mass assignment
    protected $casts = [
        'payment_date' => 'datetime', // Cast payment_date to datetime type
        'amount' => 'decimal:2', // Cast amount to decimal with 2 decimal places
    ]; // Cast attributes to specific types
    protected $hidden = [
        'created_at',
        'updated_at',
    ]; // Hide timestamps from JSON serialization
}
