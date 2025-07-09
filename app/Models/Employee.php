<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    use HasFactory;
    protected $table = 'employees';
    protected $primaryKey = 'employee_id';
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'phone',
        'address',
        'position',
        'employment_date',
        'termination_date',
        'status', // e.g., active, inactive, suspended
        'account_id',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];
    public function getFullNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }
    public function setEmailAttribute($value)
    {
        $this->attributes['email'] = strtolower($value);
    }
    public function user()
    {
        return $this->belongsTo(Account::class, 'account_id', 'account_id');
    }
}
