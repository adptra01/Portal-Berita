<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? '' }} - {{ config('app.name', 'SIBANYU') }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">

    <link rel="icon" type="image/x-icon" href="{{ asset('/admin/img/favicon/favicon.ico') }}" />

    <!-- CDN CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- CSS here -->
    {{-- <link rel="stylesheet" href="{{ asset('/guest/css/bootstrap.min.css') }}"> --}}
    {{-- <link rel="stylesheet" href="{{ asset('/guest/css/fontawesome-all.min.css') }}"> --}}

    <link rel="stylesheet" href="{{ asset('/guest/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/ticker-style.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/style.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        *,
        body {
            font-family: 'Poppins', sans-serif !important;
        }

        a {
            text-decoration: none;
        }

        .dropdown-menu a {
            text-decoration: none;
        }

        .dropdown-menu a .d-flex {
            transition: all 0.5s;
        }

        @media only screen and (min-width: 992px) {
            .dropdown-menu {
                width: 55vw;
            }

            .dropdown:hover .dropdown-menu {
                display: flex;
            }

            .dropdown-menu.show {
                display: flex;
            }
        }
    </style>


    @stack('css')

    @livewireStyles

    @vite([])

</head>

<body>

    <!-- Preloader Start -->
    {{-- <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="preloader-circle"></div>
                <div class="preloader-img pere-text">
                    <span class="fw-bold">SIBANYU</span>
                </div>
            </div>
        </div>
    </div> --}}
    <!-- Preloader Start -->

    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header">
                <nav class="navbar navbar-expand-lg bg-body fixed-top">
                    <div class="container">
                        <a class="navbar-brand fw-bold text-primary fs-2 text-lowercase"
                            href="/"><em>SIBANYU</em></a>
                        <button class="navbar-toggler border-0 text-primary" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse " id="navbarSupportedContent">
                            <x-guest-nav></x-guest-nav>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <!-- Banner / Iklan -->
    <div class="container mt-5">
        @yield('top-adverts')
    </div>

    <main>
        <!-- Trending Area Start -->
        {{ $slot }}
        <!-- Trending Area End -->
    </main>

    <div class="container mt-5">
        @yield('down-adverts')
    </div>

    <footer class="py-4">
        <div class="container border-top border-5">
            <div class="row pt-4 mb-4 mb-lg-5">
                <div class="col-12 col-lg-3 pe-lg-0 mb-4 mb-lg-0">
                    <h3 class="fw-bold text-primary text-lowercase"> <em>SIBANYU</em> </h3>
                    <p class="small text-muted mb-3">
                        <em>sibanyu</em> adalah Koran Digital yang memberikan berita dan informasi terbaru
                        seputar terkini.
                    </p>
                </div>
                <div class="col-12 col-lg-2"></div>
                <div class="col-6 col-lg-2">
                    <ul class="list-unstyled">
                        <li class="nav-item">
                            <a class="text-dark text-decoration-none" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark text-decoration-none" href="{{ route('news.all-post') }}">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate class="text-dark text-decoration-none"
                                href="{{ route('news.advert') }}">Info Iklan</a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate class="text-dark text-decoration-none"
                                href="{{ route('news.about-us') }}">Tentang
                                Kami</a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate class="text-dark text-decoration-none"
                                href="{{ route('news.contact') }}">Kontak</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">
                    <ul class="list-unstyled">
                        <li class="nav-item">
                            <a class="text-dark text-decoration-none" href="">Gallery</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark text-decoration-none" href="">Testimonials</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark text-decoration-none" href="">Sitemap</a>
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-lg-1"></div>
                <div class="col-12 col-lg-2 small mt-4 mt-lg-0">
                    <ul class="list-unstyled">
                        <li class="nav-item">
                            <a class="text-dark text-decoration-none" href=""><svg
                                    class="bi bi-pinterest text-primary me-2" fill="currentColor" height="18"
                                    viewbox="0 0 16 16" width="18" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8 0a8 8 0 0 0-2.915 15.452c-.07-.633-.134-1.606.027-2.297.146-.625.938-3.977.938-3.977s-.239-.479-.239-1.187c0-1.113.645-1.943 1.448-1.943.682 0 1.012.512 1.012 1.127 0 .686-.437 1.712-.663 2.663-.188.796.4 1.446 1.185 1.446 1.422 0 2.515-1.5 2.515-3.664 0-1.915-1.377-3.254-3.342-3.254-2.276 0-3.612 1.707-3.612 3.471 0 .688.265 1.425.595 1.826a.24.24 0 0 1 .056.23c-.061.252-.196.796-.222.907-.035.146-.116.177-.268.107-1-.465-1.624-1.926-1.624-3.1 0-2.523 1.834-4.84 5.286-4.84 2.775 0 4.932 1.977 4.932 4.62 0 2.757-1.739 4.976-4.151 4.976-.811 0-1.573-.421-1.834-.919l-.498 1.902c-.181.695-.669 1.566-.995 2.097A8 8 0 1 0 8 0z">
                                    </path>
                                </svg> Pinterest</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark text-decoration-none" href=""><svg
                                    class="bi bi-twitter text-primary me-2" fill="currentColor" height="18"
                                    viewbox="0 0 16 16" width="18" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M5.026 15c6.038 0 9.341-5.003 9.341-9.334 0-.14 0-.282-.006-.422A6.685 6.685 0 0 0 16 3.542a6.658 6.658 0 0 1-1.889.518 3.301 3.301 0 0 0 1.447-1.817 6.533 6.533 0 0 1-2.087.793A3.286 3.286 0 0 0 7.875 6.03a9.325 9.325 0 0 1-6.767-3.429 3.289 3.289 0 0 0 1.018 4.382A3.323 3.323 0 0 1 .64 6.575v.045a3.288 3.288 0 0 0 2.632 3.218 3.203 3.203 0 0 1-.865.115 3.23 3.23 0 0 1-.614-.057 3.283 3.283 0 0 0 3.067 2.277A6.588 6.588 0 0 1 .78 13.58a6.32 6.32 0 0 1-.78-.045A9.344 9.344 0 0 0 5.026 15z">
                                    </path>
                                </svg> Twitter</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark text-decoration-none" href=""><svg
                                    class="bi bi-facebook text-primary me-2" fill="currentColor" height="18"
                                    viewbox="0 0 16 16" width="18" xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M16 8.049c0-4.446-3.582-8.05-8-8.05C3.58 0-.002 3.603-.002 8.05c0 4.017 2.926 7.347 6.75 7.951v-5.625h-2.03V8.05H6.75V6.275c0-2.017 1.195-3.131 3.022-3.131.876 0 1.791.157 1.791.157v1.98h-1.009c-.993 0-1.303.621-1.303 1.258v1.51h2.218l-.354 2.326H9.25V16c3.824-.604 6.75-3.934 6.75-7.951z">
                                    </path>
                                </svg> Facebook</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-top d-lg-none"></div>
            <div class="d-block d-lg-flex justify-content-between py-3 py-lg-2">
                <div class="small mb-2 mb-lg-0 text-muted">
                    © 2024 <a class="text-primary fw-bold" href="https://github.com/adptra01">Adi Putra</a> All rights
                    reserved.
                </div>
                <div class="small">
                    <a class="d-block d-lg-inline text-muted ms-lg-2 mb-2 mb-lg-0" href="">Privacy Policy</a>
                    <a class="d-block d-lg-inline text-muted ms-lg-2" href="">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('guest/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->

    <script src="{{ asset('guest/js/vendor/jquery-1.12.4.min.js') }}"></script>
    {{-- <script src="{{ asset('guest/js/popper.min.js') }}"></script> --}}
    {{-- <script src="{{ asset('guest/js/bootstrap.min.js') }}"></script> --}}

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('guest/js/jquery.slicknav.min.js') }}"></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('guest/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('guest/js/slick.min.js') }}"></script>
    <!-- Date Picker -->
    <script src="{{ asset('guest/js/gijgo.min.js') }}"></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('guest/js/wow.min.js') }}"></script>
    <script src="{{ asset('guest/js/animated.headline.js') }}"></script>
    <script src="{{ asset('guest/js/jquery.magnific-popup.js') }}"></script>

    <!-- Breaking New Pluging -->
    <script src="{{ asset('guest/js/jquery.ticker.js') }}"></script>
    <script src="{{ asset('guest/js/site.js') }}"></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('guest/js/jquery.scrollUp.min.js') }}"></script>
    <script src="{{ asset('guest/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('guest/js/jquery.sticky.js') }}"></script>

    <!-- contact js -->
    <script src="{{ asset('guest/js/contact.js') }}"></script>
    <script src="{{ asset('guest/js/jquery.form.js') }}"></script>
    <script src="{{ asset('guest/js/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('guest/js/mail-script.js') }}"></script>
    <script src="{{ asset('guest/js/jquery.ajaxchimp.min.js') }}"></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('guest/js/plugins.js') }}"></script>
    <script src="{{ asset('guest/js/main.js') }}"></script>

    @stack('scripts')

    @livewireScripts
</body>

</html>
