<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Str;
use RalphJSmit\Laravel\SEO\Models\SEO;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Support\HasSEO;
use RalphJSmit\Laravel\SEO\Support\SEOData;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, HasSEO;

    protected $fillable = [
        'title',
        'thumbnail',
        'slug',
        'keyword',
        'content',
        'category_id',
        'status',
        'user_id',
        'viewer',
    ];

    // Dalam model Post
    public function seo()
    {
        return $this->morphOne(SEO::class, 'model');
    }

    public function getDynamicSEOData(): SEOData
    {
        $cleanContent = strip_tags($this->content); // Menghilangkan tag HTML
        $imagePath = public_path($this->thumbnail);

        return new SEOData(
            title: $this->title,
            description: Str::limit($cleanContent, 50, '...'), // Deskripsi bisa juga diambil dari konten, atau dari field keyword jika lebih sesuai
            author: $this->user->name,
            image: $imagePath, // Menggunakan thumbnail sebagai gambar
            // Anda bisa menyesuaikan atau mengabaikan properti-properti berikut sesuai kebutuhan Anda:
            url: null, // Diisi jika Anda ingin menentukan URL yang khusus
            enableTitleSuffix: true, // Sesuaikan dengan kebutuhan Anda
            site_name: 'Nama Situs Anda', // Nama situs Anda
            published_time: Carbon::parse($this->created_at), // Waktu publikasi
            modified_time: Carbon::parse($this->updated_at), // Waktu terakhir diubah
            section: 'Nama Section', // Nama section atau kategori dari konten
            tags: ['tag1', 'tag2', 'tag3'], // Tag yang terkait dengan konten
            schema: null, // Schema JSON-LD, sesuaikan jika Anda menggunakan struktur data terstruktur
            locale: 'id', // Lokal dari halaman
            robots: null // Direkomendasikan untuk menyesuaikan dengan kebutuhan SEO Anda
        );
    }

    /**
     * Get the category that owns the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * Get the user that owns the Article
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get all of the comments for the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
