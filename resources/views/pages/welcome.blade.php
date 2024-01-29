    <?php

    use function Livewire\Volt\{state};
    use function Laravel\Folio\name;
    use Carbon\Carbon;
    use App\Models\Post;
    use App\Models\Category;

    name('news.welcome');

    State([
        'trending' => fn() => Post::with('category')
            ->orderByDesc('viewer')
            ->select('slug', 'title', 'thumbnail', 'category_id')
            ->get(),

        'weeklyTopNews' => fn() => Post::with('category')
            ->where('created_at', '>=', Carbon::now()->subWeek())
            ->orderByDesc('viewer')
            ->limit(6)
            ->get(),
        'latestNews' => fn() => Post::with('category')
            ->latest()
            ->limit(6)
            ->get(),
        'categories' => fn() => Category::with([
            'posts' => function ($query) {
                $query->latest()->select('slug', 'title', 'thumbnail', 'category_id');
            },
        ])
            ->select('id', 'name', 'slug')
            ->get(), // Select specific category fields
    ]);

    ?>
    <x-guest-layout>
        <x-slot name="title">Berita Terkini Hari Ini, Kabar Akurat Terpercaya</x-slot>
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
                                    <div class="trending-top mb-30">
                                        <div class="trend-top-img">
                                            <img src="{{ Storage::url($trending->first()->thumbnail) }}"
                                                alt="{{ $trending->first()->title }}">
                                            <div class="trend-top-cap">
                                                <span class="bg-primary text-white">{{ $trending->first()->category->name }}</span>
                                                <h2>
                                                    <a
                                                        href="{{ route('news.read', ['post' => $trending->first()->slug]) }}">{{ $trending->first()->title }}</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Trending Bottom -->
                                    <div class="trending-bottom">
                                        <div class="row">
                                            @foreach ($trending->skip(1)->take(3) as $item)
                                                <div class="col-lg-4">
                                                    <div class="single-bottom mb-35">
                                                        <div class="trend-bottom-img mb-30">
                                                            <img src="{{ Storage::url($item->thumbnail) }}"
                                                                alt="{{ $item->title }}">
                                                        </div>
                                                        <div class="trend-bottom-cap">
                                                            <span
                                                                class="bg-primary text-white rounded">{{ $item->category->name }}</span>
                                                            <h4>
                                                                <a
                                                                    href="{{ route('news.read', ['post' => $item->slug]) }}">{{ $item->title }}</a>
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
                                    @foreach ($trending->skip(4)->take(4) as $item)
                                        <div class="trand-right-single d-flex">
                                            <div class="trand-right-img">
                                                <img src="{{ Storage::url($item->thumbnail) }}" style="width: 150px;">
                                            </div>
                                            <div class="trand-right-cap">
                                                <span
                                                    class="bg-primary text-white rounded">{{ $item->category->name }}</span>
                                                <h4>
                                                    <a
                                                        href="{{ route('news.read', ['post' => $item->slug]) }}">{{ $item->title }}</a>
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
                                    <div class="section-tittle mb-30">
                                        <h3>Berita Teratas Mingguan</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="weekly-news-active dot-style d-flex dot-style">
                                        @foreach ($weeklyTopNews as $no => $item)
                                            <div class="weekly-single ">
                                                <div class="weekly-img">
                                                    <img src="{{ Storage::url($item->thumbnail) }}"
                                                        alt="{{ $item->title }}">
                                                </div>
                                                <div class="weekly-caption">
                                                    <span
                                                        class="bg-primary text-white rounded">{{ $item->category->name }}</span>
                                                    <h4>
                                                        <a
                                                            href="{{ route('news.read', ['post' => $item->slug]) }}">{{ $item->title }}</a>
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
                <div class="weekly2-news-area  weekly2-pading gray-bg">
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
                                        @foreach ($latestNews as $item)
                                            <div class="weekly2-single">
                                                <div class="weekly2-img">
                                                    <img src="{{ Storage::url($item->thumbnail) }}"
                                                        alt="{{ $item->title }}">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <span
                                                        class="bg-primary text-white rounded">{{ $item->category->name }}</span>
                                                    <p>{{ $item->created_at->locale('id')->diffForHumans() }}</p>
                                                    <h4>
                                                        <a
                                                            href="{{ route('news.read', ['post' => $item->slug]) }}">{{ $item->title }}</a>
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
                    <livewire:partials.news-categories>
                </section>
                <!-- Whats New End -->
            </div>
        @endvolt
    </x-guest-layout>
