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
                                <div class="col-lg-8 posts-list">
                                    <a href="{{ auth()->user()->role === 'admin'
                                        ? route('posts.edit', ['post' => $post->id])
                                        : route('writer-posts.edit', ['post' => $post->id]) }}"
                                        class="fw-bold text-primary">
                                        < Kembali </a>

                                            <div class="alert alert-primary d-flex" role="alert">
                                                <span
                                                    class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
                                                        class="bx bx-command fs-6"></i></span>
                                                <div class="d-flex flex-column ps-1">
                                                    <h6 class="alert-heading d-flex align-items-center mb-1 fw-bold">
                                                        Informasi</h6>
                                                    <span>
                                                        Berita saat ini berstatus
                                                        <strong> {{ $post->status == 1 ? 'Terbit' : 'Tidak Terbit' }}
                                                            pada
                                                            {{ $post->created_at->locale('id') }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="section-tittle">
                                                <h2 class="fw-bold text-capitalize">{{ $post->title }}</h2>
                                                <p class="fw-normal">SIBANYU -
                                                    {{ $post->created_at->locale('id')->diffForHumans() }}
                                                </p>
                                                <div class="row justify-content-start mb-4">
                                                    <div class="col-auto p-0 ml-3">
                                                        <img src="https://api.dicebear.com/7.x/lorelei/svg?seed={{ $post->user->name ?? 'Penulis' }}"
                                                            class="rounded border-0" style="width: 55px"
                                                            alt="{{ $post->user->name }}" loading="lazy">
                                                    </div>
                                                    <div class="col-auto">
                                                        <p class="m-0 fw-bold">{{ $post->user->name ?? 'Admin' }}</p>
                                                        <small class="m-0 text-secondary">Penulis</small>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="single-post">
                                                <div class="feature-img">
                                                    <img class="img-fluid w-100" src="{{ Storage::url($post->thumbnail) }}"
                                                        alt="{{ $post->title }}" loading="lazy">
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



                                </div>
                                <div class="col-lg-4">
                                    <div class="blog_right_sidebar sticky-top" style="padding-top: 5.5rem; z-index: 1;">
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
