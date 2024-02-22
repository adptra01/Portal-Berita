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
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,700;1,500;1,700&display=swap');

        *,
        body {
            font-family: 'Poppins', sans-serif !important;
        }

        a {
            text-decoration: none;
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
                        <a class="navbar-brand fw-bold text-primary fs-2" href="/">SIBANYU</a>
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
        <img src="{{ asset('/guest/img/hero/header_card.jpg') }}" class="w-100" alt="">
    </div>

    <main>
        <!-- Trending Area Start -->
        {{ $slot }}
        <!-- Trending Area End -->

    </main>

    <!-- Remove the container if you want to extend the Footer to full width. -->
    <div class="container-fluid mt-5">

        <footer class="bg-dark">
            <div class="container p-4">
                <div class="row">
                    <div class="col-lg-6 col-md-12 mb-4">
                        <h5 class="mb-3 text-white fw-bold">SIBANYU</h5>
                        <p class="text-white">
                            SIBANYU adalah Koran Digital yang memberikan berita dan informasi terbaru
                            seputar terkini. Situs web ini menyediakan berita lokal,
                            nasional, dan internasional, serta artikel-artikel terkait topik-topik
                            penting yang relevan dengan masyarakat.
                        </p>
                    </div>
                    <div class="col-lg-3 col-md-6 mb-4">

                    </div>
                    <div class="col-lg-3 col-md-6 mb-4 text-end">
                        <h5 class="mb-3 text-white">Menu</h5>
                        <ul class="list-unstyled mb-0">
                            <li class="mb-1">
                                <a href="/">Beranda</a>
                            </li>
                            <li class="mb-1">
                                <a href="{{ route('news.all-post') }}">Semua Berita</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

            <!-- Copyright -->
        </footer>

    </div>
    <!-- End of .container -->

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
