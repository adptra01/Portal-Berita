<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Hukum',
                'slug' => 'hukum',
            ],
            [
                'name' => 'Olahraga',
                'slug' => 'olahraga',
            ],
            [
                'name' => 'Daerah',
                'slug' => 'Daerah',
            ],
            [
                'name' => 'Advertorial',
                'slug' => 'Advertorial',
            ],
            [
                'name' => 'Politik',
                'slug' => 'Politik',
            ],
            [
                'name' => 'Ekonomi',
                'slug' => 'Ekonomi',
            ],
            [
                'name' => 'Gaya Hidup',
                'slug' => 'Gaya-hidup',
            ],
            [
                'name' => 'Pemerintahan',
                'slug' => 'Pemerintahan',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
            # code...
        }
    }
}
