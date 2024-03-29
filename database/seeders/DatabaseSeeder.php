<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create();

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@testing.com',
            'role' => 'Admin',
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Test User',
            'email' => 'penulis@testing.com',
            'role' => 'Penulis',
        ]);

        $this->call([
            CategorySeeder::class,
            PostSeeder::class,
            AdvertSeeder::class,
            SettingSeeder::class,
        ]);

        // \App\Models\Post::factory(30)->create();

    }
}
