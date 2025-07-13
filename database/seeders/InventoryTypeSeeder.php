<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class InventoryTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('inventory_types')->insert([
            ['name' => 'Arranged Flowers', 'description' => 'All flower products arranged as bouquets or arrangements.'],
            ['name' => 'Add-Ons', 'description' => 'Greeting cards, balloons, chocolates, plush toys, and gift baskets.'],
            ['name' => 'Packaging Materials', 'description' => 'Wrapping, boxes, vases, baskets for production use.'],
            ['name' => 'Fresh Flowers (Stock)', 'description' => 'Raw fresh flower stems for production inventory.'],
            ['name' => 'Preserved / Dried Flowers', 'description' => 'Preserved or dried flowers used in products.'],
            ['name' => 'Artificial Flowers', 'description' => 'Artificial or silk flowers for arrangements.'],
            ['name' => 'Plants', 'description' => 'Indoor or potted plants sold.'],
            ['name' => 'Tools & Supplies', 'description' => 'Florist tools and supplies for internal use.'],
        ]);
    }
}
