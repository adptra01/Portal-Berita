<?php

use function Livewire\Volt\{state, computed, usesPagination};
use function Laravel\Folio\name;
use App\Models\Post;
use App\Models\Category;

State(['category', 'count' => 1]);

$increment = fn() => $this->count++;

$limitPages = computed(function () {
    return $this->count * 6;
});

$categoryPost = computed(function () {
    return Post::with('category')
        ->where('category_id', $this->category->id)
        ->limit($this->limitPages)
        ->latest()
        ->get();
});

?>

<div>
    <section>
        <div class="trending-main border-0">
            <div class="row gy-4 mb-4 trending-bottom">
                @foreach ($this->categoryPost as $post)
                    <article class="blog_item rounded">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0" src="{{ Storage::url($post->thumbnail) }}"
                                alt="{{ $post->title }}">
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
                                    <a class="text-capitalize">
                                        <i class="bx bx-category"></i>
                                        {{ $post->category->name }}</a>
                                </li>
                                <li>
                                    <a href="#">
                                        <i class="bx bx-happy-heart-eyes"></i> {{ $post->viewer }}
                                        Dilihat</a>
                                </li>
                            </ul>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
        <div class="container text-center">
            <button class="btn btn-primary btn-sm" wire:click="increment" wire:loading.attr="disabled">
                <i wire:loading class='bx bx-loader bx-spin'></i>
                Lebih banyak
            </button>
        </div>
    </section>
</div>