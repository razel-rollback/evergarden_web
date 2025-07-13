<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'name' => 'Admin',
            'description' => 'Administrator with full access',
        ]);
        Role::create([
            'name' => 'customer',
            'description' => 'Customer with access to their own data',
        ]);
        Role::create([
            'name' => 'Employee',
            'description' => 'Employee with basic access',
        ]);
    }
}
