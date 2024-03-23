<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <!-- SEO -->
    @yield('seo')

    <!-- CDN CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

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

        a,
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

            .dropdown:hover .dropdown-menu,
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
    @livewire('partials.brand')
    <header>
        <!-- Header Start -->
        <div class="header-area">
            <div class="main-header">
                <nav class="navbar navbar-expand-lg bg-white fixed-top">
                    <div class="container">
                        <a class="navbar-brand" href="/">
                            @yield('header')
                        </a>
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
        @yield('footer')
    </footer>

    <!-- JS here -->

    <!-- All JS Custom Plugins Link Here here -->
    <script src="{{ asset('guest/js/vendor/modernizr-3.5.0.min.js') }}" defer></script>
    <!-- Jquery, Popper, Bootstrap -->

    <script src="{{ asset('guest/js/vendor/jquery-1.12.4.min.js') }}" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous" defer>
    </script>

    <!-- Jquery Mobile Menu -->
    <script src="{{ asset('guest/js/jquery.slicknav.min.js') }}" defer></script>

    <!-- Jquery Slick , Owl-Carousel Plugins -->
    <script src="{{ asset('guest/js/owl.carousel.min.js') }}" defer></script>
    <script src="{{ asset('guest/js/slick.min.js') }}" defer></script>
    <!-- Date Picker -->
    <script src="{{ asset('guest/js/gijgo.min.js') }}" defer></script>
    <!-- One Page, Animated-HeadLin -->
    <script src="{{ asset('guest/js/wow.min.js') }}" defer></script>
    <script src="{{ asset('guest/js/animated.headline.js') }}" defer></script>
    <script src="{{ asset('guest/js/jquery.magnific-popup.js') }}" defer></script>

    <!-- Breaking New Pluging -->
    <script src="{{ asset('guest/js/jquery.ticker.js') }}" defer></script>
    <script src="{{ asset('guest/js/site.js') }}" defer></script>

    <!-- Scrollup, nice-select, sticky -->
    <script src="{{ asset('guest/js/jquery.scrollUp.min.js') }}" defer></script>
    <script src="{{ asset('guest/js/jquery.nice-select.min.js') }}" defer></script>
    <script src="{{ asset('guest/js/jquery.sticky.js') }}" defer></script>

    <!-- contact js -->
    <script src="{{ asset('guest/js/contact.js') }}" defer></script>
    <script src="{{ asset('guest/js/jquery.form.js') }}" defer></script>
    <script src="{{ asset('guest/js/jquery.validate.min.js') }}" defer></script>
    <script src="{{ asset('guest/js/mail-script.js') }}" defer></script>
    <script src="{{ asset('guest/js/jquery.ajaxchimp.min.js') }}" defer></script>

    <!-- Jquery Plugins, main Jquery -->
    <script src="{{ asset('guest/js/plugins.js') }}" defer></script>
    <script src="{{ asset('guest/js/main.js') }}" defer></script>

    @stack('scripts')

    @livewireScripts
</body>

</html>
