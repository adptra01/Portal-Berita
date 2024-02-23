<?php

use function Livewire\Volt\{state, computed, usesPagination};
use function Laravel\Folio\name;
use App\Models\Post;
use App\Models\Category;

name('categories.slug');

State([
    'topFivePosts' => fn() => Post::with('category')
        ->where('category_id', $this->category->id)
        ->orderBy('viewer')
        ->select('title', 'slug', 'category_id', 'created_at', 'thumbnail', 'content')
        ->limit(5)
        ->get(),
    'category',
]);

?>

<x-guest-layout>
    <x-slot name="title">Kategori Berita</x-slot>
    @volt
        <div>
            <div class="trending-area fix">
                <section class="pt-5">
                    <div class="container ">
                        <div class="row justify-content-center text-center mb-4 mb-md-5">
                            <div class="col-xl-9 col-xxl-8">
                                <span class="text-muted">Kategori</span>
                                <h2 class="display-5 fw-bold text-capitalize">{{ $category->name }}</h2>
                                <p class="lead">Dapatkan informasi terkini dan terpanas dari portal berita kami di sini.
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card border-0">
                                    <a href=""><img alt="" class="img-fluid rounded"
                                            src="{{ Storage::url($topFivePosts->first()->thumbnail) }}"></a>
                                    <div class="card-body px-0">
                                        <h3 class="fw-semibold my-2">
                                            <a class="text-decoration-none text-dark"
                                                href="{{ route('news.read', ['post' => $topFivePosts->first()->slug]) }}">{{ $topFivePosts->first()->title }}</a>
                                        </h3>
                                        <p>{!! Str::limit($topFivePosts->first()->content, 250, '...') !!}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 trending-main border-0">
                                <div class="row trending-bottom">
                                    @foreach ($topFivePosts->skip(1) as $post)
                                        <div class="col-6">
                                            <div class="single-bottom mb-35">
                                                <div class="trend-bottom-img mb-30">
                                                    <img src="{{ Storage::url($post->thumbnail) }}"
                                                        alt="{{ $post->title }}" loading="lazy" class="object-fit-cover"
                                                        height="170px">
                                                </div>
                                                <div class="trend-bottom-cap">
                                                    <h4 class="text-break">
                                                        <a href="{{ route('news.read', ['post' => $post->slug]) }}"
                                                            class="fw-semibold">{{ $post->title }}</a>
                                                    </h4>
                                                    <p>{{ $post->created_at->format('d M Y') }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                @livewire('partials.loadMore', ['category' => $category])
            </div>
        </div>
    @endvolt
</x-guest-layout>
