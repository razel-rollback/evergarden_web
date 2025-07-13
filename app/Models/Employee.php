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
        'position',
        'salary',
        'hire_date',
        'fire_date',
        'manager_id',
        'account_id',
        'is_active', // e.g., active, inactive, suspended
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
    public function account()
    {
        return $this->belongsTo(Account::class, 'account_id', 'account_id');
    }
    public function orders()
    {
        return $this->hasMany(Order::class, 'employee_id', 'employee_id');
    }
    public function inventory()
    {
        return $this->hasMany(InventoryTransaction::class, 'employee_id', 'employee_id');
    }
}
