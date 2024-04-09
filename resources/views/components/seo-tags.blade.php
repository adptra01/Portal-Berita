@section('seo')
    @props([
        'title' => $settings->title ?? '',
        'favicon' => $settings->icon ?? '',
        'canonical' => url()->current(),
        'description' => $settings->description ?? 'sibanyu adalah media yang lahir dari desa. Berfilosofi dari air yang terus mengalir, menyajikan informasi dari hulu menyebar hingga ke hilir. Dengan visi "dari desa untuk bangsa", mendorong pembangunan bangsa dari desa.',
        'robots' => 'index,follow',
        'language' => 'id',
        'revisitAfter' => '7 days',
        'author' => $settings->title ?? '',
        'keywords' =>
            'berita terkini, informasi terbaru, highlight, topik hangat, pencerahan, diskusi, fakta menarik, inspiratif, pemikiran baru, kejutan, pembaruan',

        'ogUrl' => url()->current(),
        'ogTitle' => $settings->title ?? '',
        'ogDescription' => $settings->description ?? 'sibanyu adalah media yang lahir dari desa. Berfilosofi dari air yang terus mengalir, menyajikan informasi dari hulu menyebar hingga ke hilir. Dengan visi "dari desa untuk bangsa", mendorong pembangunan bangsa dari desa.',
        'ogSiteName' => $settings->title ?? '',
        'ogType' => 'article',
        'ogImage' => $settings->logo ?? '',

        'twitterCard' => 'summary_large_image',
        'twitterDomain' => url()->current(),
        'twitterUrl' => url()->current(),
        'twitterTitle' => $settings->title ?? '',
        'twitterDescription' => $settings->description ?? 'sibanyu adalah media yang lahir dari desa. Berfilosofi dari air yang terus mengalir, menyajikan informasi dari hulu menyebar hingga ke hilir. Dengan visi "dari desa untuk bangsa", mendorong pembangunan bangsa dari desa.',
        'twitterImage' => $settings->logo ?? '',
    ])

    <title>{{ $title }}</title>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />
    <link rel="canonical" href="{{ $canonical }}" />
    <meta name="description" content="{{ $description }}" />
    <meta content="id" name="language" />
    <meta content="id" name="geo.country" />
    <meta http-equiv="content-language" content="In-Id" />
    <meta content="Indonesia" name="geo.placename" />
    <meta name="robots" content="{{ $robots }}" />
    <meta name="language" content="{{ $language }}" />
    <meta name="revisit-after" content="{{ $revisitAfter }}" />
    <meta name="author" content="{{ $author }}" />
    <meta name="keywords" content="{{ $keywords }}" />

    <!-- Opengraph Here -->
    <meta property="og:url" content="{{ $ogUrl }}">
    <meta property="og:title" content="{{ $ogTitle }}" />
    <meta property="og:description" content="{{ $ogDescription }}" />
    <meta property="og:site_name" content="{{ $ogSiteName }}">
    <meta property="og:type" content="{{ $ogType }}">
    <meta property="og:image" content="{{ $ogImage }}">

    <!-- Twitter Opengraph Here -->
    <meta name="twitter:card" content="{{ $twitterCard }}" />
    <meta property="twitter:domain" content="{{ $twitterDomain }}" />
    <meta property="twitter:url" content="{{ $twitterUrl }}" />
    <meta name="twitter:title" content="{{ $twitterTitle }}" />
    <meta name="twitter:description" content="{{ $twitterDescription }}" />
    <meta name="twitter:image" content="{{ $twitterImage }}">
@endsection
