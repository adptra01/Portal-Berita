    <?php
    
    use function Livewire\Volt\{state};
    use function Laravel\Folio\name;
    use App\Models\Post;
    
    name('news.welcome');
    
    State([
        'trend_top' => fn() => Post::latest()
            ->select('slug', 'title', 'thumbnail', 'category_id')
            ->first(),
        'trend_bottom' => fn() => Post::latest()
            ->limit(3)
            ->select('slug', 'title', 'thumbnail', 'category_id')
            ->get(),
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
                                            <img src="{{ Storage::url($trend_top->thumbnail) }}"
                                                alt="{{ $trend_top->title }}">
                                            <div class="trend-top-cap">
                                                <span>{{ $trend_top->category->name }}</span>
                                                <h2>
                                                    <a
                                                        href="{{ route('news.read', ['post' => $trend_top->slug]) }}">{{ $trend_top->title }}</a>
                                                </h2>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Trending Bottom -->
                                    <div class="trending-bottom">
                                        <div class="row">
                                            @foreach ($trend_bottom as $item)
                                                <div class="col-lg-4">
                                                    <div class="single-bottom mb-35">
                                                        <div class="trend-bottom-img mb-30">
                                                            <img src="{{ Storage::url($item->thumbnail) }}" alt="">
                                                        </div>
                                                        <div class="trend-bottom-cap">
                                                            <span
                                                                class="bg-primary text-white rounded">{{ $item->category->name }}</span>
                                                            <h4>
                                                                <a href="details.html">{{ $item->title }}</a>
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
                                    <div class="trand-right-single d-flex">
                                        <div class="trand-right-img">
                                            <img src="{{ asset('/guest/img/trending/right1.jpg') }}" alt="">
                                        </div>
                                        <div class="trand-right-cap">
                                            <span class="color1">Concert</span>
                                            <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                                        </div>
                                    </div>
                                    <div class="trand-right-single d-flex">
                                        <div class="trand-right-img">
                                            <img src="{{ asset('/guest/img/trending/right2.jpg') }}" alt="">
                                        </div>
                                        <div class="trand-right-cap">
                                            <span class="color3">sea beach</span>
                                            <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                                        </div>
                                    </div>
                                    <div class="trand-right-single d-flex">
                                        <div class="trand-right-img">
                                            <img src="{{ asset('/guest/img/trending/right3.jpg') }}" alt="">
                                        </div>
                                        <div class="trand-right-cap">
                                            <span class="color2">Bike Show</span>
                                            <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                                        </div>
                                    </div>
                                    <div class="trand-right-single d-flex">
                                        <div class="trand-right-img">
                                            <img src="{{ asset('/guest/img/trending/right4.jpg') }}" alt="">
                                        </div>
                                        <div class="trand-right-cap">
                                            <span class="color4">See beach</span>
                                            <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                                        </div>
                                    </div>
                                    <div class="trand-right-single d-flex">
                                        <div class="trand-right-img">
                                            <img src="{{ asset('/guest/img/trending/right5.jpg') }}" alt="">
                                        </div>
                                        <div class="trand-right-cap">
                                            <span class="color1">Skeping</span>
                                            <h4><a href="details.html">Welcome To The Best Model Winner Contest</a></h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--   Weekly-News start -->
                <div class="weekly-news-area pt-50">
                    <div class="container">
                        <div class="weekly-wrapper">
                            <!-- section Tittle -->
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="section-tittle mb-30">
                                        <h3>Weekly Top News</h3>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="weekly-news-active dot-style d-flex dot-style">
                                        <div class="weekly-single">
                                            <div class="weekly-img">
                                                <img src="{{ asset('/guest/img/news/weeklyNews2.jpg') }}" alt="">
                                            </div>
                                            <div class="weekly-caption">
                                                <span class="color1">Strike</span>
                                                <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                            </div>
                                        </div>
                                        <div class="weekly-single active">
                                            <div class="weekly-img">
                                                <img src="{{ asset('/guest/img/news/weeklyNews1.jpg') }}" alt="">
                                            </div>
                                            <div class="weekly-caption">
                                                <span class="color1">Strike</span>
                                                <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                            </div>
                                        </div>
                                        <div class="weekly-single">
                                            <div class="weekly-img">
                                                <img src="{{ asset('/guest/img/news/weeklyNews3.jpg') }}" alt="">
                                            </div>
                                            <div class="weekly-caption">
                                                <span class="color1">Strike</span>
                                                <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                            </div>
                                        </div>
                                        <div class="weekly-single">
                                            <div class="weekly-img">
                                                <img src="{{ asset('/guest/img/news/weeklyNews1.jpg') }}" alt="">
                                            </div>
                                            <div class="weekly-caption">
                                                <span class="color1">Strike</span>
                                                <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Weekly-News -->
                <livewire:partials.whats-news-area>
                    <!--   Weekly2-News start -->
                    <div class="weekly2-news-area  weekly2-pading gray-bg">
                        <div class="container">
                            <div class="weekly2-wrapper">
                                <!-- section Tittle -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-tittle mb-30">
                                            <h3>Weekly Top News</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="weekly2-news-active dot-style d-flex dot-style">
                                            <div class="weekly2-single">
                                                <div class="weekly2-img">
                                                    <img src="{{ asset('/guest/img/news/weekly2News1.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <span class="color1">Corporate</span>
                                                    <p>25 Jan 2020</p>
                                                    <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                                </div>
                                            </div>
                                            <div class="weekly2-single">
                                                <div class="weekly2-img">
                                                    <img src="{{ asset('/guest/img/news/weekly2News2.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <span class="color1">Event night</span>
                                                    <p>25 Jan 2020</p>
                                                    <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                                </div>
                                            </div>
                                            <div class="weekly2-single">
                                                <div class="weekly2-img">
                                                    <img src="{{ asset('/guest/img/news/weekly2News3.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <span class="color1">Corporate</span>
                                                    <p>25 Jan 2020</p>
                                                    <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                                </div>
                                            </div>
                                            <div class="weekly2-single">
                                                <div class="weekly2-img">
                                                    <img src="{{ asset('/guest/img/news/weekly2News4.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <span class="color1">Event time</span>
                                                    <p>25 Jan 2020</p>
                                                    <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                                </div>
                                            </div>
                                            <div class="weekly2-single">
                                                <div class="weekly2-img">
                                                    <img src="{{ asset('/guest/img/news/weekly2News4.jpg') }}"
                                                        alt="">
                                                </div>
                                                <div class="weekly2-caption">
                                                    <span class="color1">Corporate</span>
                                                    <p>25 Jan 2020</p>
                                                    <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Weekly-News -->
                    <!-- Start Youtube -->
                    <div class="youtube-area video-padding">
                        <div class="container">
                            <div class="row">
                                <div class="col-12">
                                    <div class="video-items-active">
                                        <div class="video-items text-center">
                                            <iframe src="https://www.youtube.com/embed/CicQIuG8hBo" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div class="video-items text-center">
                                            <iframe src="https://www.youtube.com/embed/rIz00N40bag" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                        <div class="video-items text-center">
                                            <iframe src="https://www.youtube.com/embed/CONfhrASy44" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>

                                        </div>
                                        <div class="video-items text-center">
                                            <iframe src="https://www.youtube.com/embed/lq6fL2ROWf8" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>

                                        </div>
                                        <div class="video-items text-center">
                                            <iframe src="https://www.youtube.com/embed/0VxlQlacWV4" frameborder="0"
                                                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                allowfullscreen></iframe>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="video-info">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="video-caption">
                                            <div class="top-caption">
                                                <span class="color1">Politics</span>
                                            </div>
                                            <div class="bottom-caption">
                                                <h2>Welcome To The Best Model Winner Contest At Look of the year</h2>
                                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit sed do eiusmod
                                                    ipsum
                                                    dolor sit. Lorem ipsum dolor sit amet consectetur adipisicing elit sed
                                                    do
                                                    eiusmod ipsum dolor sit. Lorem ipsum dolor sit amet consectetur
                                                    adipisicing
                                                    elit
                                                    sed do eiusmod ipsum dolor sit lorem ipsum dolor sit.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="testmonial-nav text-center">
                                            <div class="single-video">
                                                <iframe src="https://www.youtube.com/embed/CicQIuG8hBo" frameborder="0"
                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                                <div class="video-intro">
                                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                                </div>
                                            </div>
                                            <div class="single-video">
                                                <iframe src="https://www.youtube.com/embed/rIz00N40bag" frameborder="0"
                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                                <div class="video-intro">
                                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                                </div>
                                            </div>
                                            <div class="single-video">
                                                <iframe src="https://www.youtube.com/embed/CONfhrASy44" frameborder="0"
                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                                <div class="video-intro">
                                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                                </div>
                                            </div>
                                            <div class="single-video">
                                                <iframe src="https://www.youtube.com/embed/lq6fL2ROWf8" frameborder="0"
                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                                <div class="video-intro">
                                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                                </div>
                                            </div>
                                            <div class="single-video">
                                                <iframe src="https://www.youtube.com/embed/0VxlQlacWV4" frameborder="0"
                                                    allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                                                    allowfullscreen></iframe>
                                                <div class="video-intro">
                                                    <h4>Welcotme To The Best Model Winner Contest</h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Start youtube -->
                    <!--  Recent Articles start -->
                    <div class="recent-articles">
                        <div class="container">
                            <div class="recent-wrapper">
                                <!-- section Tittle -->
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="section-tittle mb-30">
                                            <h3>Recent Articles</h3>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="recent-active dot-style d-flex dot-style">
                                            <div class="single-recent mb-100">
                                                <div class="what-img">
                                                    <img src="{{ asset('/guest/img/news/recent1.jpg') }}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">Night party</span>
                                                    <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                                </div>
                                            </div>
                                            <div class="single-recent mb-100">
                                                <div class="what-img">
                                                    <img src="{{ asset('/guest/img/news/recent2.jpg') }}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">Night party</span>
                                                    <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                                </div>
                                            </div>
                                            <div class="single-recent mb-100">
                                                <div class="what-img">
                                                    <img src="{{ asset('/guest/img/news/recent3.jpg') }}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">Night party</span>
                                                    <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                                </div>
                                            </div>
                                            <div class="single-recent mb-100">
                                                <div class="what-img">
                                                    <img src="{{ asset('/guest/img/news/recent2.jpg') }}" alt="">
                                                </div>
                                                <div class="what-cap">
                                                    <span class="color1">Night party</span>
                                                    <h4><a href="#">Welcome To The Best Model Winner Contest</a></h4>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Recent Articles End -->
                    <!--Start pagination -->
                    <div class="pagination-area pb-45 text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="single-wrap d-flex justify-content-center">
                                        <nav aria-label="Page navigation example">
                                            <ul class="pagination justify-content-start">
                                                <li class="page-item"><a class="page-link" href="#"><span
                                                            class="flaticon-arrow roted"></span></a></li>
                                                <li class="page-item active"><a class="page-link" href="#">01</a>
                                                </li>
                                                <li class="page-item"><a class="page-link" href="#">02</a></li>
                                                <li class="page-item"><a class="page-link" href="#">03</a></li>
                                                <li class="page-item"><a class="page-link" href="#"><span
                                                            class="flaticon-arrow right-arrow"></span></a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End pagination  -->
            </div>
        @endvolt
    </x-guest-layout>
