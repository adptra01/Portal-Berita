<?php

use function Livewire\Volt\{state, computed, usesPagination};
use App\Models\Post;
use App\Models\Category;

State([
    'category',
    'count' => 1,
    'totalPostCount' => fn() => Post::where('category_id', $this->category->id)
        ->where('status', true)
        ->count(),
]);

$increment = fn() => $this->count++;

$limitPages = computed(function () {
    return $this->count * 6;
});

$categoryPost = computed(function () {
    return Post::with('category')
        ->where('category_id', $this->category->id)
        ->where('status', true)
        ->select('slug', 'title', 'thumbnail', 'content', 'viewer', 'category_id', 'created_at')
        ->limit($this->limitPages)
        ->latest()
        ->get();
});

?>

<div>
    @foreach ($this->categoryPost as $post)
        <article class="blog_item rounded">
            <div class="blog_item_img">
                <img class="card-img rounded-0" src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}"
                    loading="lazy">
                <a href="#" class="blog_item_date">
                    <h3>{{ $post->created_at->format('d') }}</h3>
                    <p>{{ $post->created_at->format('M') }}</p>
                </a>
            </div>

            <div class="blog_details">
                <a class="d-inline-block" href="{{ route('news.read', ['post' => $post->slug]) }}">
                    <h2>{{ $post->title }}</h2>
                </a>

                <p>{!! Str::limit($post->content, 250, '...') !!}</p>

                <ul class="blog-info-link">
                    <li>
                        <i class="bx bx-category"></i>
                        {{ $post->category->name }}
                    </li>
                    <li>
                        <i class="bx bx-happy-heart-eyes"></i> {{ $post->viewer }}
                        Dilihat
                    </li>
                </ul>
            </div>
        </article>
    @endforeach

    <div class="container text-center">
        <button class="{{ $this->categoryPost->count() >= $totalPostCount ? 'd-none' : 'genric-btn primary rounded' }}"
            wire:click="increment" wire:loading.attr="disabled">
            Tampilkan Lagi
        </button>
        <i wire:loading class='bx bx-loader bx-spin'></i>
    </div>
</div>
