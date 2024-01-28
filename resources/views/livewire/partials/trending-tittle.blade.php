<?php

use function Livewire\Volt\{state};
use App\Models\Post;

state([
    'trending_tittle' => fn() => Post::limit(5)
        ->select('title')
        ->get(),
]);

?>

<div>
    <div class="trending-tittle">
        <strong class="bg-primary text-white">Trending now</strong>
        <!-- <p>Rem ipsum dolor sit amet, consectetur adipisicing elit.</p> -->
        <div class="trending-animated">
            <ul id="js-news" class="js-hidden">
                @foreach ($trending_tittle as $item)
                    <li class="news-item">{{ Str::limit($item->title, 29, '...') }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
