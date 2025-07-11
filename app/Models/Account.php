<?php

namespace App\Models;

use \Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $table = 'accounts';
    protected $primaryKey = 'account_id';

    protected $fillable = [
        'username',
        'password',
        'email',
        'googleid',
        'role_id',
    ];


    protected $hidden = [
        'password',
        'googleid',
        'remember_token',
    ];

    protected $casts = [
        'is active' => 'boolean',
        'last_login' => 'datetime',
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id', 'role_id');
    }
    public function customers()
    {
        return $this->hasMany(Customer::class, 'account_id', 'account_id');
    }
    public function employees()
    {
        return $this->hasMany(Employee::class, 'account_id', 'account_id');
    }
}
