<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('categories')->insert([
            [
                'name' => 'Birthday',
                'description' => 'Celebration of a person\'s birth.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Anniversary',
                'description' => 'Celebration of a significant event, typically a wedding.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Congratulations',
                'description' => 'Celebration of achievements or milestones.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sympathy',
                'description' => 'Expressions of condolence and support during difficult times.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Love & Romance',
                'description' => 'Celebration of love and romantic relationships.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'General / Everyday',
                'description' => 'Cards for everyday occasions and sentiments.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Seasonal',
                'description' => 'Cards for seasonal celebrations and holidays.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
