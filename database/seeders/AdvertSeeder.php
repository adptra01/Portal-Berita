<?php

namespace Database\Seeders;

use App\Models\Advert;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\Storage;

class AdvertSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Fetch data from the API
        $response = Http::get('https://api-berita-indonesia.vercel.app/antara/hiburan/');

        // Check if the request was successful
        if ($response->successful()) {
            $data = $response->json();

            // Extract posts data
            $posts = $data['data']['posts'];

            // Insert posts into the database
            foreach ($posts as $postData) {
                $imageName = basename($postData['thumbnail']);

                $createAdvert = [
                    'name' => $postData['title'],
                    'link' => $postData['link'],
                    'position' => $this->getRandomPosition(),
                    'start_date' => Carbon::parse($postData['pubDate'])->toDateString(),
                    'end_date' => Carbon::now()->toDateString(),
                    'alt' => $postData['description'],
                    'image' => 'image/' . $imageName,
                ];
                $advert = Advert::create($createAdvert);

                // Save image to storage
                $imageUrl = $postData['thumbnail'];
                $imageData = file_get_contents($imageUrl);
                Storage::put('public/image/' . $imageName, $imageData);

                $this->command->info('Tambah Contoh Iklan: ' . $advert->name);
            }

            $this->command->info('Adverts seeded successfully!');
        } else {
            $this->command->error('Failed to fetch data from the API.');
        }
    }

    private function getRandomPosition()
    {
        return ['side', 'top'][rand(0, 1)];
    }
}
