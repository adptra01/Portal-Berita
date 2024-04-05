<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="{{ asset('/admin/') }}" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <link rel="icon" type="image/x-icon" href="{{ asset('/admin/img/favicon/favicon.ico') }}" />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('/admin/vendor/fonts/boxicons.css') }}" />

    <link rel="stylesheet" href="{{ asset('/admin/vendor/css/core.css') }}" class="template-customizer-core-css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css') }}" />
    <link rel="stylesheet" href="{{ asset('/admin/css/demo.css') }}" />

    <link rel="stylesheet" href="{{ asset('/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />

    <link rel="stylesheet" href="{{ asset('/admin/vendor/css/pages/page-auth.css') }}" />
    <script src="{{ asset('/admin/vendor/js/helpers.js') }}" defer></script>
    </script>

    <script src="{{ asset('/admin/js/config.js') }}" defer></script>

    @vite([])

</head>

<body>

    <style>
        video {
            object-fit: cover;
            width: 100vw;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
        }
    </style>

    <div class="authentication-wrapper authentication-cover">
        <video
            src="https://videocdn.cdnpk.net/joy/content/video/free/video0485/large_preview/_import_61a73d8344a728.01824993.mp4?filename=1118403_liquid_4k_under_3840x2160.mp4"
            autoplay loop playsinline muted></video>

        <div class="authentication-inner row m-0">
            <!-- /Left Text -->
            <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center p-5">
            </div>
            <!-- /Left Text -->

            <!-- Login -->
            <div
                class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg p-sm-5 p-4 bg-white zindex-1">
                <div class="w-px-400 mx-auto">
                    @if (session('error'))
                        <div class="alert alert-danger d-flex" role="alert">
                            <span class="badge badge-center rounded-pill bg-danger border-label-danger p-3 me-2"><i
                                    class="bx bx-detail fs-6"></i></span>
                            <div class="d-flex flex-column ps-1">
                                <h6 class="alert-heading d-flex align-items-center mb-1">Alert!!</h6>
                                <span>{{ session('error') }}</span>
                            </div>
                        </div>
                    @endif

                    <!-- Logo -->
                    <div class="app-brand mb-3">
                        <a href="/" class="app-brand-link gap-2">
                            @if ($setting && $setting->logo)
                                <img src="{{ Storage::url($setting->logo) }}" alt="Logo" width="100"
                                    height="100%" class="d-inline-block align-text-top">
                            @else
                                <span class="fw-bold text-primary fs-2">{{ $setting->title ?? '' }}</span>
                            @endif
                           
                            <span class="app-brand-text demo text-body fw-bold"><em>sibanyu</em></span>
                        </a>
                    </div>
                    <!-- /Logo -->
                    <p class="mb-4">Dapatkan akses eksklusif ke konten berita terkini, analisis mendalam, dan cerita
                        inspiratif yang disajikan khusus untuk kamu.</p>

                    {{ $slot }}

                </div>
            </div>
        </div>
        <!-- /Login -->
    </div>

    <script src="{{ asset('/admin/vendor/libs/jquery/jquery.js') }}" defer></script>
    <script src="{{ asset('/admin/vendor/libs/popper/popper.js') }}" defer></script>
    <script src="{{ asset('/admin/vendor/js/bootstrap.js') }}" defer></script>
    <script src="{{ asset('/admin/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}" defer></script>

    <script src="{{ asset('/admin/vendor/js/menu.js') }}" defer></script>


    <script src="{{ asset('/admin/js/main.js') }}" defer></script>


    <script async defer src="https://buttons.github.io/buttons.js') }}" defer></script>
</body>

</html>
