<?php
use function Laravel\Folio\name;

name('news.read');

?>
<x-guest-layout>
    <x-slot name="title">{{ $post->title }}</x-slot>
    <!-- About US Start -->
    <div class="about-area">
        <div class="container">
            <!-- Hot Aimated News Tittle-->
            <div class="row">
                <div class="col-lg-12">
                    <livewire:partials.trending-tittle>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8">
                    <!-- Trending Tittle -->
                    <div class="about-right mb-90">
                        <div class="section-tittle">
                            <h2 class="fw-bold">{{ $post->title }}</h2>
                            <p class="fw-bold">SIBANYU - {{ $post->created_at->locale('id')->diffForHumans() }}</p>
                            <div class="row justify-content-start mb-4">
                                <div class="col-auto p-0">
                                    <img src="https://api.dicebear.com/7.x/lorelei/svg?seed=Johns"
                                        class="rounded-pill border" style="width: 55px" alt="...">
                                </div>
                                <div class="col-auto">
                                    <p class="m-0 fw-bold">{{ $post->user->name }}</p>
                                    <small class="m-0 text-secondary">Penulis</small>
                                </div>

                            </div>
                        </div>
                        <div class="about-img mb-4">
                            <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}">
                        </div>
                        <div class="about-prea">
                            <article class="about-pera1 mb-25">
                                {!! $post->content !!}
                            </article>
                        </div>
                        <div class="container bg-black p-3 rounded">
                            <div class="social-share">
                                <div class="section-tittle">
                                    <ul>
                                        <li class="fw-bold fs-5 text-white">Berbagi : </li>
                                        <li><a href="#"><img src="/guest/img/news/icon-ins.png"
                                                    alt=""></a>
                                        </li>
                                        <li><a href="#"><img src="/guest/img/news/icon-fb.png" alt=""></a>
                                        </li>
                                        <li><a href="#"><img src="/guest/img/news/icon-tw.png" alt=""></a>
                                        </li>
                                        <li><a href="#"><img src="/guest/img/news/icon-yo.png" alt=""></a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- From -->
                    {{-- <div class="row">
                        <div class="col-lg-8">
                            <form class="form-contact contact_form mb-80" action="contact_process.php" method="post"
                                id="contactForm" novalidate="novalidate">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea class="form-control w-100 error" name="message" id="message" cols="30" rows="9"
                                                onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Message'" placeholder="Enter Message"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control error" name="name" id="name"
                                                type="text" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter your name'"
                                                placeholder="Enter your name">
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <input class="form-control error" name="email" id="email"
                                                type="email" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter email address'" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-group">
                                            <input class="form-control error" name="subject" id="subject"
                                                type="text" onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = 'Enter Subject'" placeholder="Enter Subject">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mt-3">
                                    <button type="submit" class="button button-contactForm boxed-btn">Send</button>
                                </div>
                            </form>
                        </div>
                    </div> --}}
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
    <!-- About US End -->
</x-guest-layout>
