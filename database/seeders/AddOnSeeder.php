<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AddOnSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('add_ons')->insert([
            [
                'name' => 'Greeting Cards',
                'add_on_type_id' => 1,
                'price' => 5.00,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Small Balloons',
                'add_on_type_id' => 2,
                'price' => 3.00,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chocolates',
                'add_on_type_id' => 3,
                'price' => 10.00,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Plush Toys',
                'add_on_type_id' => 4,
                'price' => 15.00,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gift Baskets',
                'add_on_type_id' => 5,
                'price' => 20.00,
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ]

        ]);
    }
}
