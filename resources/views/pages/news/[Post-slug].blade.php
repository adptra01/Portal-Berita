<?php
use function Laravel\Folio\name;
use function Livewire\Volt\{state, computed};
use App\Models\Comment;

name('news.read');

state(['post', 'add_viewer' => fn() => $this->post->increment('viewer')]);

$comments = computed(function () {
    return Comment::where('post_id', $this->post->id)->get();
});

?>
<x-guest-layout>
    <x-slot name="title">{{ $post->title }}</x-slot>

    @include('layouts.style-post')
    @livewire('partials.top-adverts')
    {{-- @livewire('partials.popup-adverts') --}}

    @volt
        <div>
            <!-- About US Start -->
            <div class="about-area">
                <div class="container-fluid">
                    <!-- Hot Aimated News Tittle-->
                    <div class="container">
                        <livewire:partials.trending-tittle>
                    </div>
                    <section class="blog_area single-post-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 posts-list">
                                    <div class="section-tittle">
                                        <h2 class="fw-bold text-capitalize">{{ $post->title }}</h2>
                                        <p class="fw-normal">SIBANYU -
                                            {{ $post->created_at->locale('id')->diffForHumans() }}
                                        </p>
                                        <div class="row justify-content-start mb-4">
                                            <div class="col-auto p-0 ml-3">
                                                <img src="https://api.dicebear.com/7.x/lorelei/svg?seed={{ $post->user->name ?? 'Penulis' }}"
                                                    class="rounded border-0" style="width: 55px"
                                                    alt="{{ $post->user->name }}" loading="eager">
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
                                        <div class="d-sm-flex justify-content-between text-center align-items-center">

                                            <!-- User View -->
                                            {{-- <p class="like-info fw-bold">
                                                <span class="align-middle">
                                                    <i class='bx bx-heart '></i> </span>
                                                123 Suka
                                            </p> --}}

                                            <p class="like-info fw-bold">
                                                <span class="align-middle">
                                                    <i class="bx bx-happy-heart-eyes"></i>
                                                </span>
                                                {{ $post->viewer }} Dilihat
                                            </p>

                                            {{-- <p class="like-info fw-bold">
                                                <span class="align-middle">
                                                    <i class='bx bx-message-rounded-dots'></i>
                                                </span>
                                                {{ $this->comments->count() }} Komentar
                                            </p> --}}
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

                                    <!-- User Comment -->
                                    <livewire:partials.comment :post="$post" />

                                </div>
                                <div class="col-lg-4">
                                    <div class="blog_right_sidebar sticky-top" style="padding-top: 6rem;">
                                        <livewire:partials.related-news>
                                            <!-- New Poster -->
                                            @livewire('partials.side-adverts', ['countAdverts' => 6])
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
