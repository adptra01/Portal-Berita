<?php
use function Livewire\Volt\{state, computed, mount};
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

state(['trending', 'categories', 'weeklyTopNews', 'latestNews']);

mount(function () {
    $this->categories = Category::with([
        'posts' => function ($query) {
            $query->latest()->select('slug', 'title', 'thumbnail', 'category_id');
        },
    ])
        ->select('id', 'name', 'slug')
        ->get();

    $this->weeklyTopNews = Cache::remember('weekly_top_news', now()->addMinutes(60), function () {
        return Post::with('category')
            ->where('created_at', '>=', Carbon::now()->subWeeks(2)->toDateTimeString())
            ->where('status', true)
            ->orderByDesc('viewer')
            ->limit(6)
            ->get();
    });

    $this->latestNews = Cache::remember('latest_news', now()->addMinutes(60), function () {
        return Post::with('category')->where('status', true)->latest()->limit(6)->get();
    });

    $this->trending = Cache::remember('trending_posts', now()->addMinutes(60), function () {
        return Post::with('category')->orderByDesc('viewer')->where('status', true)->select('slug', 'title', 'thumbnail', 'category_id')->get();
    });
});

?>
<x-guest-layout>

    @livewire('adverts.popup')
    @livewire('adverts.top')

    @volt
        <div>
            <x-seo-tags :title="'Sibanyu Situs Berita Terkini ' . now()->year" :description="'Dapatkan informasi terbaru seputar berita terkini, analisis mendalam, dan cerita inspiratif di Sibanyu. Jelajahi konten eksklusif yang disajikan khusus untuk Anda.'" :keywords="'beranda, sibanyu, berita terkini, analisis, cerita inspiratif, konten eksklusif'" />

            <div class="trending-area fix">
                <div class="container">
                    <div class="trending-main">
                        <!-- Trending Tittle -->
                        <div class="row">
                            <div class="col-lg-12">
                                <livewire:partials.trending-tittle>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-8">
                                <!-- Trending Top -->
                                @if ($this->trending->isNotEmpty())
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img">
                                            <img src="{{ Storage::url($this->trending->first()->thumbnail) }}"
                                                alt="{{ $this->trending->first()->title }}" loading="lazy"
                                                class="object-fit-cover" height="450px">
                                            <div class="trend-top-cap">
                                                <span
                                                    class="bg-primary text-white">{{ $this->trending->first()->category->name }}</span>
                                                <h2>
                                                    <a
                                                        href="{{ route('news.read', ['post' => $this->trending->first()->slug]) }}">{{ $this->trending->first()->title }}</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                @endif

                                <!-- Trending Bottom -->
                                @include('layouts.welcome.bottom')
                            </div>
                            <!-- Trending Right -->
                            <div class="col-lg-4">
                                @include('layouts.welcome.right')
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!--   Weekly-News start -->
            <div class="weekly-news-area pt-50">
                <div class="container">
                    <div class="weekly-wrapper border-0">
                        <!-- section Tittle -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-tittle">
                                    <h3>Berita <br class="d-md-none"> Mingguan</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="weekly-news-active dot-style d-flex dot-style">
                                    @include('layouts.welcome.weeklyTopNews')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Weekly-News -->

            <!--   Weekly2-News start -->
            <div class="weekly2-news-area weekly2-pading gray-bg">
                <div class="container">
                    <div class="weekly2-wrapper">
                        <!-- section Tittle -->
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-tittle mb-30">
                                    <h3>Berita Terbaru</h3>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            @if ($this->latestNews)
                                <div class="col-12">
                                    <div class="weekly2-news-active dot-style d-flex dot-style">
                                        <!-- latestNews -->
                                        @include('layouts.welcome.latestNews')
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Weekly-News -->

            <!-- Whats New Start -->
            <section class="whats-news-area pt-50 pb-20">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-8">
                            <div class="sticky-top" style="z-index: 1;">
                                <div class="row d-flex justify-content-between">
                                    <ul class="nav nav-pills mb-3 justify-content-center bg-body-tertiary py-3 px-2 rounded"
                                        id="pills-tab" role="tablist">
                                        @foreach ($this->categories as $category)
                                            <li class="nav-item" role="presentation">
                                                <button class="nav-link text-capitalize {{ $loop->first ? 'active' : '' }}"
                                                    id="pills-{{ $category->slug }}-tab" data-bs-toggle="pill"
                                                    data-bs-target="#pills-{{ $category->slug }}" type="button"
                                                    role="tab" aria-controls="pills-{{ $category->slug }}"
                                                    aria-selected="true">{{ $category->name }}</button>
                                            </li>
                                        @endforeach
                                    </ul>

                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <!-- Nav Card -->
                                        <div class="tab-content" id="pills-tabContent">

                                            @include('layouts.welcome.categories')

                                        </div>
                                        <!-- End Nav Card -->
                                        <div class="text-center">
                                            <a href="{{ route('categories.index') }}" class="mb-5 btn btn-primary">
                                                Lihat Kategori Lainnya...
                                            </a>
                                        </div>

                                        <div class="d-none d-lg-block p-5">
                                            @livewire('adverts.bottom')
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 pt-sm-5">
                            <div class="blog_right_sidebar">
                                <!-- New Poster -->
                                @livewire('adverts.side')

                                <div class="d-block d-lg-none">
                                    @livewire('adverts.bottom')
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Whats New End -->
        </div>
    @endvolt
</x-guest-layout>
