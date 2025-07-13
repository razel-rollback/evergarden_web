<?php

namespace Database\Seeders;

use Database\Seeders\EmployeeSeeder;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(RoleSeeder::class);
        $this->call(CustomerSeeder::class);
        $this->call(EmployeeSeeder::class);
        $this->call(AddOnTypeSeeder::class);
        $this->call(AddOnSeeder::class);
        $this->call(ProdcutTypeSeeder::class);
        $this->call(CategorySeeder::class);
        $this->call(InventoryTypeSeeder::class);
    }
}
