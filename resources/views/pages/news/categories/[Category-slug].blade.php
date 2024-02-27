<?php

use function Livewire\Volt\{state, computed, usesPagination};
use function Laravel\Folio\name;
use App\Models\Post;
use App\Models\Category;

name('categories.slug');

State([
    'topFivePosts' => fn() => Post::with('category')
        ->where('category_id', $this->category->id)
        ->where('status', true)
        ->orderBy('viewer')
        ->select('title', 'slug', 'category_id', 'created_at', 'thumbnail', 'content')
        ->limit(5)
        ->get(),
    'category',
    'categories' => fn() => Category::with('posts')->get(),
]);

?>

<x-guest-layout>
    <x-slot name="title">Kategori Berita</x-slot>
    @volt
        <div>
            <div class="trending-area fix">
                <section class="pt-5">
                    <div class="container ">
                        <h4 class="widget_title mb-2 fw-bold text-capitalize">Trending {{ $category->name }} </h4>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="card border-0">
                                    <a href="">
                                        <img alt="" class="img-fluid rounded"
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
                        <div class="row mt-5">
                            <h4 class="widget_title mb-2 fw-bold text-capitalize">Berita {{ $category->name }}</h4>

                            <div class="col-lg-8 mb-5 mb-lg-0">
                                <div class="blog_left_sidebar">

                                    @livewire('partials.loadMore', ['category' => $category])

                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="blog_right_sidebar">

                                    <aside class="single_sidebar_widget post_category_widget bg-body pt-0">
                                        <h4 class="widget_title mb-2 fw-bold">Kategori Berita</h4>

                                        <ul class="list cat-list border-0">
                                            @foreach ($categories as $category)
                                                <li>
                                                    <a href="{{ route('categories.slug', ['category' => $category->slug]) }}"
                                                        class="d-flex justify-content-between">
                                                        <p class="text-capitalize">{{ $category->name }} </p>
                                                        <p>( {{ $category->posts->count() }} )</p>
                                                    </a>
                                                </li>
                                            @endforeach

                                        </ul>
                                    </aside>

                                    <aside class="single_sidebar_widget popular_post_widget rounded bg-body">
                                        <!-- Related News -->
                                        <livewire:partials.related-news>
                                            <!-- New Poster -->
                                            <div class="news-poster d-block text-center">
                                                <img src="/guest/img/news/news_card.jpg" class="mb-3" alt="">
                                            </div>

                                    </aside>

                                </div>
                            </div>
                        </div>
                    </div>
                </section>


            </div>
        </div>
    @endvolt
</x-guest-layout>
