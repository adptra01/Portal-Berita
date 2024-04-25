<?php
use function Laravel\Folio\name;
use function Livewire\Volt\{state, computed, mount};
use Illuminate\Support\Str;
use App\Models\Comment;
use App\Models\Post;

name('news.read');

state(['post', 'description']);

mount(function () {
    $post = Post::with('user')
        ->active()
        ->select('id', 'title', 'slug', 'content', 'thumbnail', 'created_at', 'viewer', 'user_id', 'keyword', 'alt')
        ->find($this->post->id);

    $this->description = Str::limit($post->content, 100, '...');

    if ($post) {
        Post::where('id', $this->post->id)->increment('viewer');

        $this->post = $post;
    } else {
        return redirect('/');
    }
});

?>
<x-guest-layout>
    @include('layouts.style-post')
    @livewire('adverts.top')
    @livewire('adverts.popup')

    @volt
        <div>
            <x-seo-tags :title="$post->title" :description="$description" :keywords="$post->keyword" />
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
                                    <div class="sticky-top" style="z-index: 1;">

                                        <div class="section-tittle">
                                            <h2 class="fw-bold text-capitalize">{{ $post->title }}</h2>
                                            <p class="fw-normal">sibanyu,
                                                {{ $post->created_at->format('d-m-Y') }}
                                            </p>
                                            <div class="row justify-content-start mb-4">
                                                {{-- <div class="col-auto p-0 ml-3">
                                                    <img src="https://api.dicebear.com/7.x/lorelei/svg?seed={{ $post->user->name ?? 'Penulis' }}"
                                                        class="rounded border-0" style="width: 55px"
                                                        alt="{{ $post->user->name }}" loading="lazy">
                                                </div> --}}
                                                <div class="col-auto">
                                                    <p class="m-0 fw-bold">{{ $post->user->name ?? 'Admin' }}</p>
                                                    <small class="m-0 text-secondary">Penulis</small>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="single-post">
                                            <div class="feature-img mb-3">
                                                <img class="img-fluid w-100" src="{{ Storage::url($post->thumbnail) }}"
                                                    alt="{{ $post->alt ?? $post->title }}" loading="lazy">
                                                <small>{{ $post->alt ?? '' }}</small>
                                            </div>
                                            <div class="ck-content">
                                                {!! $post->content !!}
                                            </div>
                                        </div>
                                        <div class="navigation-top border-0">
                                            <div class="d-sm-flex justify-content-between text-center align-items-center">

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

                                        <!-- User Comment -->
                                        <div class="mb-5 pb-5 pb-lg-0">
                                            <livewire:partials.comment :post="$post" />
                                        </div>

                                        <div class="d-none d-lg-block py-3">
                                            @livewire('adverts.bottom')
                                        </div>
                                    </div>

                                </div>
                                <div class="col-lg-4">
                                    <div class="blog_right_sidebar">
                                        <livewire:partials.related-news>
                                            <!-- New Poster -->
                                            @livewire('adverts.side')
                                            <div class="d-block d-lg-none">
                                                @livewire('adverts.bottom')
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
