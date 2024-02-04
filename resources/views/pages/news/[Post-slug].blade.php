<?php
use function Laravel\Folio\name;
use function Livewire\Volt\{state};

state(['post', 'add_viewer' => fn() => $this->post->increment('viewer')]);
name('news.read');

?>
<x-guest-layout>
    @include('layouts.style-post')
    <x-slot name="title">{{ $post->title }}</x-slot>
    <div>
        @volt
            <!-- About US Start -->
            <div class="about-area">
                <div class="container">
                    <!-- Hot Aimated News Tittle-->
                    <div class="row">
                        <div class="col-lg-12">
                            <livewire:partials.trending-tittle>
                        </div>
                    </div>

                    <section class="blog_area single-post-area">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-8 posts-list">
                                    <div class="section-tittle">
                                        <h2 class="font-weight-bold">{{ $post->title }}</h2>
                                        <p class="font-weight-bold">SIBANYU -
                                            {{ $post->created_at->locale('id')->diffForHumans() }}
                                        </p>
                                        <div class="row justify-content-start mb-4">
                                            <div class="col-auto p-0 ml-3">
                                                <img src="https://api.dicebear.com/7.x/lorelei/svg?seed=Johns"
                                                    class="rounded border-0" style="width: 55px"
                                                    alt="{{ $post->user->name }}">
                                            </div>
                                            <div class="col-auto">
                                                <p class="m-0 font-weight-bold">{{ $post->user->name }}</p>
                                                <small class="m-0 text-secondary">Penulis</small>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-post">
                                        <div class="feature-img">
                                            <img class="img-fluid" src="{{ Storage::url($post->thumbnail) }}"
                                                alt="{{ $post->title }}" loading="lazy">
                                        </div>
                                        <div class="blog_details fr-view">
                                            {!! $post->content !!}
                                        </div>
                                    </div>
                                    <div class="navigation-top">
                                        <div class="d-sm-flex justify-content-between text-center">
                                            <p class="like-info font-weight-bold">
                                                <span class="align-middle">
                                                    <i class="fa fa-heart"></i>
                                                </span>
                                                123
                                            </p>
                                            <p class="like-info font-weight-bold">
                                                <span class="align-middle">
                                                    <i class="fa fa-eye"></i>
                                                </span>
                                                {{ $post->viewer }}
                                            </p>
                                            <div class="col-sm-4 text-center my-2 my-sm-0">
                                                <!-- <p class="comment-count"><span class="align-middle"><i class="fa fa-comment"></i></span> 06 Comments</p> -->
                                            </div>
                                            <ul class="social-icons">
                                                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                                                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fab fa-dribbble"></i></a></li>
                                                <li><a href="#"><i class="fab fa-behance"></i></a></li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="comments-area">
                                        <h4>05 Comments</h4>
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="/guest/img/comment/comment_1.png" alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <p class="comment">
                                                            Multiply sea night grass fourth day sea lesser rule open subdue
                                                            female fill
                                                            which them
                                                            Blessed, give fill lesser bearing multiply sea night grass
                                                            fourth
                                                            day sea
                                                            lesser
                                                        </p>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <h5>
                                                                    <a href="#">Emilly Blunt</a>
                                                                </h5>
                                                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                                            </div>
                                                            <div class="reply-btn">
                                                                <a href="#" class="btn-reply text-uppercase">reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="/guest/img/comment/comment_2.png" alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <p class="comment">
                                                            Multiply sea night grass fourth day sea lesser rule open subdue
                                                            female fill
                                                            which them
                                                            Blessed, give fill lesser bearing multiply sea night grass
                                                            fourth
                                                            day sea
                                                            lesser
                                                        </p>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <h5>
                                                                    <a href="#">Emilly Blunt</a>
                                                                </h5>
                                                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                                            </div>
                                                            <div class="reply-btn">
                                                                <a href="#" class="btn-reply text-uppercase">reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="comment-list">
                                            <div class="single-comment justify-content-between d-flex">
                                                <div class="user justify-content-between d-flex">
                                                    <div class="thumb">
                                                        <img src="/guest/img/comment/comment_3.png" alt="">
                                                    </div>
                                                    <div class="desc">
                                                        <p class="comment">
                                                            Multiply sea night grass fourth day sea lesser rule open subdue
                                                            female fill
                                                            which them
                                                            Blessed, give fill lesser bearing multiply sea night grass
                                                            fourth
                                                            day sea
                                                            lesser
                                                        </p>
                                                        <div class="d-flex justify-content-between">
                                                            <div class="d-flex align-items-center">
                                                                <h5>
                                                                    <a href="#">Emilly Blunt</a>
                                                                </h5>
                                                                <p class="date">December 4, 2017 at 3:12 pm </p>
                                                            </div>
                                                            <div class="reply-btn">
                                                                <a href="#" class="btn-reply text-uppercase">reply</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="comment-form">
                                        <h4>Leave a Reply</h4>
                                        <form class="form-contact comment_form" action="#" id="commentForm">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <textarea class="form-control w-100" name="comment" id="comment" cols="30" rows="9"
                                                            placeholder="Write Comment"></textarea>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" name="name" id="name"
                                                            type="text" placeholder="Name">
                                                    </div>
                                                </div>
                                                <div class="col-sm-6">
                                                    <div class="form-group">
                                                        <input class="form-control" name="email" id="email"
                                                            type="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <input class="form-control" name="website" id="website"
                                                            type="text" placeholder="Website">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit"
                                                    class="button button-contactForm btn_1 boxed-btn">Send
                                                    Message</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="blog_right_sidebar">
                                        <livewire:partials.related-news>
                                            <!-- New Poster -->
                                            <div class="news-poster d-block">
                                                <img src="/guest/img/news/news_card.jpg" class="mb-3" alt="">
                                            </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        @endvolt
    </div>
    <!-- About US End -->
</x-guest-layout>
