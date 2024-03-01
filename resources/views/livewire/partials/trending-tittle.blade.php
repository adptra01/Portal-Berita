<?php

use function Livewire\Volt\{state};
use App\Models\Post;

state([
    'trending_titles' => fn() => Post::orderByDesc('viewer')->limit(5)->select('title')->get(),
]);

?>

<div>
    <div class="trending-tittle">
        <strong class="bg-primary text-white px-3">Trending</strong>
        <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
        <div class="trending-animated">
            <ul id="js-news" class="js-hidden">
                @foreach ($trending_titles as $item)
                    <li class="news-item d-inline-block text-truncate" style="max-width: 150px;">
                        {{ Str::limit($item->title, 29, '...') }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
