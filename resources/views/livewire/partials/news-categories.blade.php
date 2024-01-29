<?php

use function Livewire\Volt\{state};
use App\Models\Category;

state([
    'categories' => fn() => Category::with([
        'posts' => function ($query) {
            $query->latest()->select('slug', 'title', 'thumbnail', 'category_id');
        },
    ])
        ->select('id', 'name', 'slug')
        ->get(),
]);

?>

<div>
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="row d-flex justify-content-between">
                    <div class="properties__button">
                        <!--Nav Button  -->
                        <nav>
                            <div class="nav nav-tabs rounded" id="nav-tab" role="tablist">
                                @foreach ($categories as $category)
                                    <a class="nav-item nav-link {{ $loop->first ? 'active' : '' }}"
                                        id="nav-{{ $category->slug }}-tab" data-toggle="tab"
                                        href="#nav-{{ $category->slug }}" role="tab"
                                        aria-controls="nav-{{ $category->slug }}"
                                        aria-selected="{{ $loop->first ? 'true' : 'false' }}">{{ $category->name }}</a>
                                @endforeach
                            </div>
                        </nav>
                        <!--End Nav Button  -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <!-- Nav Card -->
                        <div class="tab-content" id="nav-tabContent">
                            @foreach ($categories as $category)
                                <!-- card one -->
                                <div class="tab-pane fade {{ $loop->first ? 'show active' : '' }}"
                                    id="nav-{{ $category->slug }}" role="tabpanel"
                                    aria-labelledby="nav-{{ $category->slug }}-tab">
                                    <div class="whats-news-caption">
                                        <div class="row">
                                            @foreach ($category->posts->take(4) as $post)
                                                <div class="col-lg-6 col-md-6 mb-3">
                                                    <div class="single-what-news mb-100">
                                                        <div class="what-img">
                                                            <img src="{{ Storage::url($post->thumbnail) }}"
                                                                alt="{{ $post->title }}">
                                                        </div>
                                                        <div class="what-cap">
                                                            <span class="bg-primary text-white rounded">{{ $post->category->name }}</span>
                                                            <h4>
                                                                <a href="{{ route('news.read', ['post' => $post->slug]) }}">{{ $post->title }}</a>
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
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- New Poster -->
                <div class="news-poster d-block">
                    <img src="/guest/img/news/news_card.jpg" class="mb-3" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
