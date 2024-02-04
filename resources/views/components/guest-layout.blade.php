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
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/guest/img/favicon.ico') }}">

    <!-- Bootstrap CSS -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"> --}}

    <!-- CSS here -->
    <link rel="stylesheet" href="{{ asset('/guest/css/bootstrap.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/guest/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/ticker-style.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/slicknav.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/nice-select.css') }}">
    <link rel="stylesheet" href="{{ asset('/guest/css/style.css') }}">

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,700;1,500;1,700&display=swap');

        * {
            font-family: 'Poppins', sans-serif;
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
            <div class="main-header ">
                <div class="header-mid d-none d-md-block">
                    <div class="container">
                        <div class="row d-flex align-items-center">
                            <!-- Logo -->
                            <div class="col-xl-3 col-lg-3 col-md-3">
                                <div class="logo">
                                    <h1 class="font-weight-bold text-primary"> SIBANYU
                                    </h1>
                                </div>
                            </div>
                            <div class="col-xl-9 col-lg-9 col-md-9">
                                <div class="header-banner f-right ">
                                    <img src="{{ asset('/guest/img/hero/header_card.jpg') }}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom header-sticky">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-xl-10 col-lg-10 col-md-12 header-flex">
                                <!-- sticky -->
                                <div class="sticky-logo">
                                    <h1 class="font-weight-bold text-primary"> SIBANYU
                                    </h1>
                                </div>
                                <!-- Main-menu -->
                                <div class="main-menu d-none d-md-block">
                                    <x-guest-nav></x-guest-nav>
                                </div>
                            </div>
                            <!-- Mobile Menu -->
                            <div class="col-12">
                                <div class="mobile_menu d-block d-md-none"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <main>
        <!-- Trending Area Start -->
        {{ $slot }}
        <!-- Trending Area End -->

    </main>

    <footer>
        <!-- Footer Start-->
        <div class="footer-area footer-padding fix">
            <div class="container">
                <div class="row d-flex justify-content-between">
                    <div class="col-xl-5 col-lg-5 col-md-7 col-sm-12">
                        <div class="single-footer-caption">
                            <div class="single-footer-caption">
                                <!-- logo -->
                                <div class="footer-logo">
                                    <h1 class="font-weight-bold text-primary"> SIBANYU
                                    </h1>
                                </div>
                                <div class="footer-tittle">
                                    <div class="footer-pera">
                                        <p>SIBANYU adalah Koran Digital yang memberikan berita dan informasi terbaru
                                            seputar terkini. Situs web ini menyediakan berita lokal,
                                            nasional, dan internasional, serta artikel-artikel terkait topik-topik
                                            penting yang relevan dengan masyarakat.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-4  col-sm-6">
                        <div class="single-footer-caption mt-60">
                            <div class="footer-tittle">
                                <h4>Newsletter</h4>
                                <p>Heaven fruitful doesn't over les idays appear creeping</p>
                                <!-- Form -->
                                <div class="footer-form">
                                    <div id="mc_embed_signup">
                                        <form target="_blank"
                                            action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                            method="get" class="subscribe_form relative mail_part">
                                            <input type="email" name="email" id="newsletter-form-email"
                                                placeholder="Email Address" class="placeholder hide-on-focus"
                                                onfocus="this.placeholder = ''"
                                                onblur="this.placeholder = ' Email Address '">
                                            <div class="form-icon">
                                                <button type="submit" name="submit" id="newsletter-submit"
                                                    class="email_icon newsletter-submit button-contactForm"><img
                                                        src="{{ asset('/guest/img/logo/form-iocn.png') }}"
                                                        alt=""></button>
                                            </div>
                                            <div class="mt-10 info"></div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </footer>

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('guest/js/vendor/modernizr-3.5.0.min.js') }}"></script>
    <!-- Jquery, Popper, Bootstrap -->
    <script src="{{ asset('guest/js/vendor/jquery-1.12.4.min.js') }}"></script>
    <script src="{{ asset('guest/js/popper.min.js') }}"></script>
    <script src="{{ asset('guest/js/bootstrap.min.js') }}"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"> --}}
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
