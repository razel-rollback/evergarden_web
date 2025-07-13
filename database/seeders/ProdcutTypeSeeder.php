<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdcutTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('product_types')->insert([
            ['name' => 'Hand-Tied Bouquets'],
            ['name' => 'Vase Arrangements'],
            ['name' => 'Boxed Arrangements'],
            ['name' => 'Basket Arrangements'],
            ['name' => 'Luxury Collection'],
            ['name' => 'Inaugural & Grand Opening']

        ]);
    }
}
