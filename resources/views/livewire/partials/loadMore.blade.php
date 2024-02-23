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
    <section class="py-5">
        <div class="container trending-main border-0">
            <div class="row gy-4 mb-4 trending-bottom">
                @foreach ($this->categoryPost as $item)
                    <div class="col-sm-6 col-lg-4 mb-5">
                        <div class="single-bottom mb-35">
                            <div class="trend-bottom-img mb-30">
                                <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}" loading="lazy"
                                    class="object-fit-cover" height="250px">
                            </div>
                            <div class="trend-bottom-cap">
                                <span
                                    class="bg-primary text-white rounded text-uppercase">{{ $item->category->name }}</span>
                                <h4 class="text-break">
                                    <a href="{{ route('news.read', ['post' => $item->slug]) }}">{{ $item->title }}</a>
                                </h4>
                                <p>{{ $item->created_at->format('d M Y') }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="d-grid col-md-2 mx-auto">
            <button class="btn btn-primary btn-lg" wire:click="increment" wire:loading.attr="disabled">Read
                more</button>
        </div>
    </section>
</div>
