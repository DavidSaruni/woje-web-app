<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            
            [
                'name' => 'Protection',
                'slug' => 'protection',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Health',
                'slug' => 'health',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Peace Building',
                'slug' => 'peace-building',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Governance and Justice',
                'slug' => 'governance-justice',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Economic Empowerment',
                'slug' => 'economic-empowerment',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Impact Stories',
                'slug' => 'impact-stories',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
<<<<<<< Updated upstream
=======
                'name' => 'News and Updates',
                'slug' => 'news-and-updates',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
>>>>>>> Stashed changes
                'name' => 'Careers',
                'slug' => 'careers',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('news_categories')->insert($categories);
    }
}
