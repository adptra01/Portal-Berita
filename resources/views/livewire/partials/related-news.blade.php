<?php

use function Livewire\Volt\{state};
use function Laravel\Folio\name;
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;

state([
    'trending' => fn() => Post::with('category')
        ->inRandomOrder()
        ->select('slug', 'title', 'thumbnail', 'category_id')
        ->get(),
]);

?>

<div>
    <div class="trending-area fix">
        <div class="trending-main border-0">
            <h5 class="mb-3">Berita Lainnya: </h5>
            @foreach ($trending->skip(4)->take(4) as $item)
                <div class="trand-right-single d-flex">
                    <div class="trand-right-img">
                        <img src="{{ Storage::url($item->thumbnail) }}" style="width: 150px;">
                    </div>
                    <div class="trand-right-cap">
                        <span class="bg-primary text-white rounded">{{ $item->category->name }}</span>
                        <h4 class="text-break">
                            <a href="{{ route('news.read', ['post' => $item->slug]) }}">{{ $item->title }}</a>
                        </h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
