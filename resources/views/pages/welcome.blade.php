<?php
use function Livewire\Volt\{state, computed};
use Carbon\Carbon;
use App\Models\Post;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

$now = Carbon::now();
$twoWeeksAgo = $now->subWeek(2);

state([
    'trending' => fn() => Cache::remember('trending_posts', 30, function () {
        return Post::with('category')->orderByDesc('viewer')->where('status', true)->select('slug', 'title', 'thumbnail', 'category_id')->get();
    }),
]);

$weeklyTopNews = computed(function () use ($twoWeeksAgo) {
    return Cache::remember('weekly_top_news', 40, function () use ($twoWeeksAgo) {
        return Post::with('category')->where('created_at', '>=', $twoWeeksAgo)->where('status', true)->orderByDesc('viewer')->limit(6)->get();
    });
});

$latestNews = computed(function () {
    return Cache::remember('latest_news', 50, function () {
        return Post::with('category')->where('status', true)->latest()->limit(6)->get();
    });
});

$categories = computed(function () {
    return Cache::remember('categories', 60, function () {
        return Category::with([
            'posts' => function ($query) {
                $query->latest()->select('slug', 'title', 'thumbnail', 'category_id');
            },
        ])
            ->limit(5)
            ->select('id', 'name', 'slug')
            ->get();
    });
});

?>
<x-guest-layout>
    <x-seo-tags :title="'Portal Berita Terkini Sibanyu'" :description="'sibanyu adalah media yang lahir dari desa. Berfilosofi dari air yang terus mengalir, menyajikan informasi dari hulu menyebar hingga ke hilir. Dengan visi  ?>'"dari desa untuk bangsa", mendorong pembangunan bangsa dari desa.'"
        :keywords="'berita, terkini, Sibanyu, informasi, kategori'" />
    @livewire('adverts.popup')
    @livewire('adverts.top')

    @volt
        <div>
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
                                <div class="trending-bottom">
                                    <div class="row">
                                        @foreach ($this->trending->skip(1)->take(3) as $item)
                                            <div class="col-lg-4">
                                                <div class="single-bottom mb-35">
                                                    <div class="trend-bottom-img mb-30">
                                                        <img src="{{ Storage::url($item->thumbnail) }}" loading="lazy"
                                                            alt="{{ $item->title }}" class="object-fit-cover"
                                                            style="min-height: 160px;">
                                                    </div>
                                                    <div class="trend-bottom-cap">
                                                        <span
                                                            class="bg-primary text-white rounded">{{ $item->category->name }}</span>
                                                        <h4 class="text-break">
                                                            <a
                                                                href="{{ route('news.read', ['post' => $item->slug]) }}">{{ Str::limit($item->title, 70, ' ...') }}</a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                            <!-- Riht content -->
                            <div class="col-lg-4">
                                @foreach ($this->trending->skip(4)->take(4) as $item)
                                    <div class="trand-right-single d-flex">
                                        <div class="trand-right-img">
                                            <img src="{{ Storage::url($item->thumbnail) }}" class="object-fit-cover"
                                                style="min-height: 95px; width: 150px" loading="lazy"
                                                alt="{{ $item->title }}">
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
                                    @foreach ($this->weeklyTopNews as $no => $item)
                                        <div class="weekly-single">
                                            <div class="weekly-img">
                                                <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}"
                                                    loading="lazy" class="object-fit-cover" style="height: 250px;">
                                            </div>
                                            <div class="weekly-caption">
                                                <span
                                                    class="bg-primary text-white rounded">{{ $item->category->name }}</span>
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
                            <div class="col-12">
                                <div class="weekly2-news-active dot-style d-flex dot-style">
                                    @foreach ($this->latestNews as $item)
                                        <div class="weekly2-single">
                                            <div class="weekly2-img">
                                                <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}"
                                                    loading="lazy" class="object-fit-cover" style="height: 200px;">
                                            </div>
                                            <div class="weekly2-caption">
                                                <span
                                                    class="bg-primary text-white rounded">{{ $item->category->name }}</span>
                                                <p>{{ $item->created_at->format('d M Y') }}</p>
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

                                            @foreach ($this->categories as $category)
                                                <div class="tab-pane fade show {{ $loop->first ? 'show active' : '' }}"
                                                    id="pills-{{ $category->slug }}" role="tabpanel"
                                                    aria-labelledby="pills-{{ $category->slug }}-tab" tabindex="0">

                                                    <div class="whats-news-caption">
                                                        <div class="row">
                                                            @foreach ($category->posts->take(8) as $item)
                                                                <div class="col-lg-6 col-md-6 mb-3">
                                                                    <div class="single-what-news mb-100">
                                                                        <div class="what-img">
                                                                            <img src="{{ Storage::url($item->thumbnail) }}"
                                                                                alt="{{ $item->title }}" loading="lazy"
                                                                                class="object-fit-cover"
                                                                                style="height: 250px;">
                                                                        </div>
                                                                        <div class="what-cap">
                                                                            <span
                                                                                class="bg-primary text-white rounded">{{ $item->category->name }}</span>
                                                                            <h4 class="text-break">
                                                                                <a
                                                                                    href="{{ route('news.read', ['post' => $item->slug]) }}">{{ Str::limit($item->title, 70, ' ...') }}</a>
                                                                            </h4>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <!-- End Nav Card -->
                                        <a href="{{ route('news.search-post') }}" class="mb-3">
                                            <span
                                                class="d-flex justify-content-center text-primary fw-bold fs-6 my-auto">Lihat
                                                Kategori
                                                Lainnya...</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="blog_right_sidebar">
                                <!-- New Poster -->
                                @livewire('adverts.side')
                            </div>

                        </div>
                    </div>
                </div>
            </section>
            <!-- Whats New End -->
        </div>
    @endvolt
</x-guest-layout>
