<?php
use function Laravel\Folio\name;

name('news.read');

?>
<x-guest-layout>
    <style>
        .blog_details {
            color: #212529;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        }

        .blog_details h1 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
        }

        .blog_details h1 strong {
            color: inherit;
        }

        .blog_details ol {
            margin-bottom: 1rem;
            padding-left: 1.25rem;
            list-style-type: decimal;
        }

        .blog_details ul {
            margin-bottom: 1rem;
            padding-left: 1.25rem;
            list-style-type: disc;
        }

        .blog_details li {
            margin-bottom: 0.25rem;
            list-style: inherit;
        }

        .blog_details p {
            margin-bottom: 1rem;
            font-size: 1rem;
        }

        .blog_details blockquote {
            margin: 0 0 1rem;
            padding: 0.5rem 1rem;
            border-left: 0.25rem solid #dee2e6;
            color: #6c757d;
            font-style: italic;
        }

        .blog_details blockquote p {
            margin: 0;
            font-style: italic;
        }

        .blog_details strong {
            font-weight: 700;
        }

        .blog_details em {
            font-style: italic;
        }

        /* Bootstrap styles */
        .blog_details a {
            color: #0d6efd;
            text-decoration: none;
            /* Remove underline for all links */
        }
    </style>
    @push('css')
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/froala-editor@latest/js/plugins/paragraph_format.min.js">
        <link href="{{ asset('/admin/css/froala_style.min.css') }}" rel="stylesheet" type="text/css" />
    @endpush
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
                                            class="rounded border-0" style="width: 55px" alt="{{ $post->user->name }}">
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
                                    <p class="like-info"><span class="align-middle"><i class="fa fa-heart"></i></span>
                                        Lily and
                                        4
                                        people like this</p>
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
                                <div class="navigation-area">
                                    <div class="row">
                                        <div
                                            class="col-lg-6 col-md-6 col-12 nav-left flex-row d-flex justify-content-start align-items-center">
                                            <div class="thumb">
                                                <a href="#">
                                                    <img class="img-fluid" src="/guest/img/post/preview.png"
                                                        alt="">
                                                </a>
                                            </div>
                                            <div class="arrow">
                                                <a href="#">
                                                    <span class="lnr text-white ti-arrow-left"></span>
                                                </a>
                                            </div>
                                            <div class="detials">
                                                <p>Prev Post</p>
                                                <a href="#">
                                                    <h4>Space The Final Frontier</h4>
                                                </a>
                                            </div>
                                        </div>
                                        <div
                                            class="col-lg-6 col-md-6 col-12 nav-right flex-row d-flex justify-content-end align-items-center">
                                            <div class="detials">
                                                <p>Next Post</p>
                                                <a href="#">
                                                    <h4>Telescopes 101</h4>
                                                </a>
                                            </div>
                                            <div class="arrow">
                                                <a href="#">
                                                    <span class="lnr text-white ti-arrow-right"></span>
                                                </a>
                                            </div>
                                            <div class="thumb">
                                                <a href="#">
                                                    <img class="img-fluid" src="/guest/img/post/next.png"
                                                        alt="">
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="blog-author">
                                <div class="media align-items-center">
                                    <img src="/guest/img/blog/author.png" alt="">
                                    <div class="media-body">
                                        <a href="#">
                                            <h4>Harvard milan</h4>
                                        </a>
                                        <p>Second divided from form fish beast made. Every of seas all gathered use
                                            saying
                                            you're, he
                                            our dominion twon Second divided from</p>
                                    </div>
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
                                                    Blessed, give fill lesser bearing multiply sea night grass fourth
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
                                                    Blessed, give fill lesser bearing multiply sea night grass fourth
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
                                                    Blessed, give fill lesser bearing multiply sea night grass fourth
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
                                        <button type="submit" class="button button-contactForm btn_1 boxed-btn">Send
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
    <!-- About US End -->
</x-guest-layout>
