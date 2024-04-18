<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Post;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'admin@testing.com',
            'role' => 'Admin',
        ]);

        User::factory()->create([
            'name' => 'developer',
            'google_id' => '114807912013138563831',
            'email' => 'm.a.syaputra.94@gmail.com',
            'role' => 'Admin',
            'password' => '$2y$12$x8rNwvi9LIsnc9ZHTNOcB.wmqpkTsgvZ04vXIdEBiOZ1KUS8dYF4C'
        ]);

        User::factory()->create([
            'name' => 'Luthfy Hasratama',
            'email' => 'luthfyhasratama@gmail.com',
            'role' => 'Admin',
        ]);

        User::factory()->create([
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

        // Post::factory(30)->create();

    }
}
