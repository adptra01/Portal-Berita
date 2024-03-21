<?php

namespace App\Jobs;

use App\Models\Post;
use App\Models\Advert;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class CleanupOrphanImages implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $this->cleanupOrphanAdvertImages();
        $this->cleanupOrphanPostThumbnails();
    }
    /**
     * Clean up orphan images for Adverts.
     *
     * @return void
     */
    private function cleanupOrphanAdvertImages()
    {
        // Ambil semua gambar yang tersimpan
        $images = Storage::files('public/image');

        // Lakukan iterasi pada setiap gambar
        foreach ($images as $image) {
            // Ambil nama file gambar
            $imageName = basename($image);

            // Cek apakah gambar terkait dengan entri Advert
            if (!Advert::where('image', 'LIKE', '%' . $imageName . '%')->exists()) {
                // Jika tidak ada entri Advert yang terkait, hapus gambar
                Storage::delete('public/image/' . $imageName);
            }
        }
    }

    /**
     * Clean up orphan images for Post thumbnails.
     *
     * @return void
     */
    private function cleanupOrphanPostThumbnails()
    {
        // Ambil semua gambar yang tersimpan
        $images = Storage::files('public/thumbnail');

        // Lakukan iterasi pada setiap gambar
        foreach ($images as $image) {
            // Ambil nama file gambar
            $imageName = basename($image);

            // Cek apakah gambar terkait dengan entri Post
            if (!Post::where('thumbnail', 'LIKE', '%' . $imageName . '%')->exists()) {
                // Jika tidak ada entri Post yang terkait, hapus gambar
                Storage::delete('public/thumbnail/' . $imageName);
            }
        }
    }
}
