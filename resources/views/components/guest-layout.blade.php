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
                <nav class="navbar navbar-expand-lg bg-white fixed-top">
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

    <div class="container">
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
                            <a class="text-dark text-decoration-none fs-6" href="/">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark text-decoration-none fs-6"
                                href="{{ route('news.all-post') }}">Kategori</a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate class="text-dark text-decoration-none fs-6"
                                href="{{ route('news.advert') }}">Info Iklan</a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate class="text-dark text-decoration-none fs-6"
                                href="{{ route('news.about-us') }}">Tentang
                                Kami</a>
                        </li>
                        <li class="nav-item">
                            <a wire:navigate class="text-dark text-decoration-none fs-6"
                                href="{{ route('news.contact') }}">Kontak</a>
                        </li>
                    </ul>
                </div>
                <div class="col-6 col-lg-2">

                </div>
                <div class="col-12 col-lg-1"></div>
                <div class="col-12 col-lg-2 small mt-4 mt-lg-0">
                    <ul class="list-unstyled">
                        <li class="nav-item">
                            <a class="text-dark text-decoration-none fs-6" href="">Owner</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark text-decoration-none fs-6" href="">Partner</a>
                        </li>
                        <li class="nav-item">
                            <a class="text-dark text-decoration-none fs-6" href="">Member</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="border-top d-lg-none"></div>
            <div class="d-block d-lg-flex justify-content-between py-3 py-lg-2">
                <div class="small mb-2 mb-lg-0 text-muted">
                    © {{ now()->format('Y') }} <a class="text-primary fw-bold" href="https://github.com/adptra01"
                        target="_blank" rel="noopener noreferrer">Adi
                        Putra</a> All rights
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
