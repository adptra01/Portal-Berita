<!doctype html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>TEST DEPLOY</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <!-- Google Tag Manager -->
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                'gtm.start': new Date().getTime(),
                event: 'gtm.js'
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != 'dataLayer' ? '&l=' + l : '';
            j.async = true;
            j.src =
                'https://www.googletagmanager.com/gtm.js?id=' + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, 'script', 'dataLayer', 'GTM-P2N9CT8S');
    </script>
    <!-- End Google Tag Manager -->

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
    <link rel="stylesheet" href="{{ asset('/guest/css/custom.css') }}">

    @stack('css')
    @livewireStyles

    @vite([])
</head>

<body>
    @livewire('partials.brand')
    <header>
        <!-- Header Start -->
        <div class="header-area shadow-none">
            <div class="main-header">
                <nav class="navbar bg-body">
                    <div class="container">
                        <a class="navbar-brand" href="/">
                            @yield('header')
                        </a>
                        <form class="d-flex gap-2" role="search" action="/search">
                            <input class="form-control form-control-sm" type="search" placeholder="Search"
                                aria-label="Search" name="keywords">

                            <button type="submit" class="genric-btn primary rounded small">Cari</button>
                        </form>
                    </div>
                </nav>
                <nav class="navbar navbar-expand-lg bg-body">
                    <div class="container">
                        <button class="navbar-toggler bg-primary border-0 focus-ring focus-ring-light"
                            style="color: transparent" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="bx bx-menu-alt-left fs-3 text-white"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                            <x-guest-nav></x-guest-nav>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
        <!-- Header End -->
    </header>

    <!-- Banner / Iklan -->
    <div class="container mt-2">
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

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-887L00Q2FR"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-887L00Q2FR');
    </script>

    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P2N9CT8S" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    @stack('scripts')

    @livewireScripts
</body>

</html>
