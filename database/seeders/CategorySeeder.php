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
                'name' => 'terbaru',
                'slug' => 'terbaru',
            ],
            [
                'name' => 'politik',
                'slug' => 'politik',
            ],
            [
                'name' => 'hukum',
                'slug' => 'hukum',
            ],
            [
                'name' => 'ekonomi',
                'slug' => 'ekonomi',
            ],
            [
                'name' => 'olahraga',
                'slug' => 'olahraga',
            ],
            [
                'name' => 'lifestyle',
                'slug' => 'lifestyle',
            ],
            [
                'name' => 'hiburan',
                'slug' => 'hiburan',
            ],
            [
                'name' => 'tekno',
                'slug' => 'tekno',
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
            # code...
        }
    }
}
