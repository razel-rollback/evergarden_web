<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AddOnTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('add_on_types')->insert([
            [
                'name' => 'Greeting Cards',
                'description' => 'Blank or themed greeting cards for various occasions like birthdays, anniversaries, and sympathy.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Small Balloons',
                'description' => 'Small balloons with messages like "Happy Birthday", "Get Well Soon", or "I Love You".',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Chocolates',
                'description' => 'Assorted chocolates including Ferrero Rocher and artisanal chocolate bars.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Plush Toys',
                'description' => 'Mini to medium-sized teddy bears or plush toys suitable for romantic bouquets.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Gift Baskets',
                'description' => 'Gift baskets with assorted items like snacks, fruits, or gourmet treats.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
