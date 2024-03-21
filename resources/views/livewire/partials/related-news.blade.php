<?php

use function Livewire\Volt\{state, mount};
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;

state(['trending']);

mount(function () {
    $cacheKey = 'trending_' . Str::random(20);
    $this->trending = Post::with('category')->where('status', true)->inRandomOrder()->select('slug', 'title', 'thumbnail', 'category_id')->take(5)->get();
});

?>

<div>
    <div class="trending-area fix z-0">
        <div class="trending-main border-0">
            <h5 class="mb-4 fw-bold">Berita Lainnya </h5>
            @foreach ($trending as $item)
                <div class="trand-right-single d-flex">
                    <div class="trand-right-img">
                        <img src="{{ Storage::url($item->thumbnail) }}" class="object-fit-cover"
                            style="min-height: 95px; width: 150px" loading="lazy">
                    </div>
                    <div class="trand-right-cap">
                        <span class="bg-primary text-white rounded">{{ $item->category->name }}</span>
                        <h4 class="text-break">
                            <a
                                href="{{ route('news.read', ['post' => $item->slug]) }}">{{ Str::limit($item->title, 70, ' ...') }}</a>
                        </h4>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
