<?php
use function Laravel\Folio\name;
use function Livewire\Volt\{state, computed, mount};
use App\Models\Comment;
use App\Models\Post;

name('preview.read');

state(['post', 'add_viewer' => fn() => $this->post->increment('viewer')]);

mount(function () {
    $this->post = Post::find($this->post->id);
});

?>
<x-guest-layout>

    @include('layouts.style-post')

    @volt
        <div>
            <x-seo-tags :title="$post->title" />
            <!-- About US Start -->
            <div class="about-area">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-body align-content-center text-center bg-secondary rounded"
                            style="height: 200px; width: 100%">
                            <h3 class="fw-bold text-white">Contoh Iklan</h3>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body align-content-center text-center bg-secondary rounded"
                            style="height: 200px; width: 100%">
                            <h3 class="fw-bold text-white">Contoh Iklan</h3>
                        </div>
                    </div>
                    <!-- Hot Aimated News Tittle-->
                    <div class="container">
                        <livewire:partials.trending-tittle>
                    </div>
                    <section class="blog_area single-post-area">
                        <div class="container">
                            <div class="row">
                                <a href="{{ auth()->user()->role === 'Admin'
                                    ? route('posts.edit', ['post' => $post->id])
                                    : route('writer-posts.edit', ['post' => $post->id]) }}"
                                    class="fw-bold text-primary">
                                    < Kembali </a>
                                        <div class="col-lg-8 posts-list">
                                            <div class="sticky-top" style="z-index: 1;">

                                                <div class="section-tittle">
                                                    <h2 class="fw-bold text-capitalize">{{ $post->title }}</h2>
                                                    <p class="fw-semibold mb-0 fs-6">sibanyu,
                                                        {{ $post->created_at->format('d M Y') }}
                                                    </p>
                                                    <p class="fs-6">{{ $post->user->name ?? 'Admin' }}</p>
                                                </div>
                                                <div class="single-post">
                                                    <div class="feature-img mb-3">
                                                        <img class="img-fluid w-100"
                                                            src="{{ Storage::url($post->thumbnail) }}"
                                                            alt="{{ $post->alt ?? $post->title }}" loading="lazy">
                                                        <p style="font-size: 10px">{{ $post->alt ?? '' }}</p>
                                                    </div>
                                                    <div class="ck-content">
                                                        {!! $post->content !!}
                                                    </div>
                                                </div>
                                                <div class="navigation-top border-0">
                                                    <div
                                                        class="d-sm-flex justify-content-between text-center align-items-center">

                                                        <p class="like-info fw-bold">
                                                            <span class="align-middle">
                                                                <i class="bx bx-happy-heart-eyes"></i>
                                                            </span>
                                                            {{ $post->viewer }} Dilihat
                                                        </p>


                                                        <div class="col-sm-4 text-center my-2 my-sm-0">
                                                            <ul class="social-icons">
                                                                <li>
                                                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ route('news.read', ['post' => $post->slug]) }}"
                                                                        target="_blank">
                                                                        <i class='bx bxl-facebook-square fs-5'></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="https://twitter.com/intent/tweet?text=my%20share%20text&url={{ route('news.read', ['post' => $post->slug]) }}"
                                                                        target="_blank">
                                                                        <i class='bx bxl-twitter fs-5'></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="http://www.linkedin.com/shareArticle?mini=true&url={{ route('news.read', ['post' => $post->slug]) }}&title=my%20share%20text&summary=dit%20is%20de%20linkedin%20summary"
                                                                        target="_blank">
                                                                        <i class='bx bxl-linkedin-square fs-5'></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="https://wa.me/?text={{ route('news.read', ['post' => $post->slug]) }}"
                                                                        target="_blank">
                                                                        <i class='bx bxl-whatsapp fs-5'></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="d-none d-lg-block py-3">
                                                    @livewire('adverts.bottom')
                                                </div>
                                            </div>

                                        </div>
                                        <div class="col-lg-4">
                                            <div class="blog_right_sidebar sticky-top"
                                                style="padding-top: 5.5rem; z-index: 1;">
                                                <livewire:partials.related-news>
                                                    <!-- New Poster -->
                                                    <div class="card">
                                                        <div class="card-body align-content-center text-center bg-secondary rounded"
                                                            style="height: 200px; width: 100%">
                                                            <h3 class="fw-bold text-white">Contoh Iklan</h3>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body align-content-center text-center bg-secondary rounded"
                                                            style="height: 200px; width: 100%">
                                                            <h3 class="fw-bold text-white">Contoh Iklan</h3>
                                                        </div>
                                                    </div>
                                                    <div class="card">
                                                        <div class="card-body align-content-center text-center bg-secondary rounded"
                                                            style="height: 200px; width: 100%">
                                                            <h3 class="fw-bold text-white">Contoh Iklan</h3>
                                                        </div>
                                                    </div>
                                            </div>
                                        </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    @endvolt
    <!-- About US End -->
</x-guest-layout>
