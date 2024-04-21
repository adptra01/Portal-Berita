<?php

use function Livewire\Volt\{state, mount};
use function Laravel\Folio\name;
use App\Models\Post;
use App\Models\Category;

name('categories.slug');

State([
    'top_five_posts' => fn() => Post::with('category')
        ->where('category_id', $this->category->id)
        ->where('status', true)
        ->orderBy('viewer')
        ->select('title', 'slug', 'category_id', 'created_at', 'thumbnail', 'content')
        ->limit(5)
        ->get(),
    'categories',
    'category',
    'keywords_string ',
]);

mount(function () {
    $base_keyword = ['berita terkini', 'informasi terbaru', 'highlight', 'topik hangat', 'pencerahan', 'diskusi', 'fakta menarik', 'inspiratif', 'pemikiran baru', 'kejutan', 'pembaruan'];

    $name_category = Category::pluck('name')->toArray();

    $keywords = array_merge($base_keyword, $name_category, [$this->category->name]);
    $this->keywords_string = implode(', ', $keywords);

    $this->categories = Cache::remember('categoriesCount', now()->addMinutes(60), function () {
        return Category::withCount('posts')->get(['name', 'posts_count']);
    });
});

?>

<x-guest-layout>
    @livewire('adverts.top')

    @volt
        <div>
            <x-seo-tags :title="'Kategori ' . $category->name . ' - Portal Berita Terkini Sibanyu'" :description="'Temukan berita terkini yang paling relevan dan menarik dari kategori ' .
                $category->name .
                ' di Portal Berita Terkini Sibanyu.'" :keywords="$keywords_string" />

            <div class="container">
                <livewire:partials.trending-tittle>
            </div>

            <div class="container ">
                <h4 class="widget_title mb-2 fw-bold text-capitalize">Trending {{ $category->name }}
                </h4>
                <div class="row">
                    <div class="col-md-6">
                        <div class="card border-0">
                            <a href="">
                                <img alt="{{ $top_five_posts->first()->title }}" class="img-fluid rounded"
                                    src="{{ Storage::url($top_five_posts->first()->thumbnail) }}" loading="lazy"></a>
                            <div class="card-body px-0">
                                <h3 class="fw-semibold my-2">
                                    <a class="text-decoration-none text-dark"
                                        href="{{ route('news.read', ['post' => $top_five_posts->first()->slug]) }}">{{ $top_five_posts->first()->title }}</a>
                                </h3>
                                <p>{!! Str::limit($top_five_posts->first()->content, 250, '...') !!}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 trending-main border-0">
                        <div class="row trending-bottom">
                            @foreach ($top_five_posts->skip(1) as $post)
                                <div class="col-6">
                                    <div class="single-bottom mb-35">
                                        <div class="trend-bottom-img mb-30">
                                            <img src="{{ Storage::url($post->thumbnail) }}"
                                                alt="{{ $post->alt ?? $post->title }}" loading="lazy"
                                                class="object-fit-cover" height="170px">
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


            <section class="blog_area section-padding pt-5">
                <div class="container">
                    <div class="row">
                        <h4 class="widget_title mb-2 fw-bold text-capitalize">Berita Utama Mingguan </h4>
                        <div class="col-lg-8 mb-5 mb-lg-0">
                            <div class="blog_left_sidebar">

                                @livewire('partials.loadMore', ['category' => $category])

                                <div class="d-none d-lg-block py-5">
                                    @livewire('adverts.bottom')
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="blog_right_sidebar sticky-top" style="z-index: 2;">
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
                                        @livewire('adverts.side')
                                        <div class="d-block d-lg-none">
                                            @livewire('adverts.bottom')
                                        </div>
                                </aside>
                            </div>
                        </div>

                    </div>
                </div>
            </section>
        </div>
    @endvolt
</x-guest-layout>
