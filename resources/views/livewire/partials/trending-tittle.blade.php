<?php

use function Livewire\Volt\{computed};
use App\Models\Post;

$trendingTitles = computed(function () {
    $cacheKey = 'trending_post_titles';

    return Cache::remember($cacheKey, 60 * 5, function () {
        // Cache for 5 minutes
        return Post::orderByDesc('viewer')->where('status', true)->limit(5)->select('title')->get();
    });
});

?>

<div>
    <div class="trending-tittle">
        <strong class="bg-primary text-white px-3">Trending</strong>
        <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
        <div class="trending-animated">
            <ul id="js-news" class="js-hidden">
                @foreach ($this->trendingTitles as $item)
                    <li class="news-item d-inline-block text-truncate" style="max-width: 150px;">
                        {{ Str::limit($item->title, 29, '...') }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
