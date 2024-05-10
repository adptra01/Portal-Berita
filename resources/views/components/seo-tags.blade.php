@section('seo')
    @props([
        'title' => $settings->title,
        'favicon' => Storage::url($settings->logo),
        'canonical' => url()->current(),
        'description' => $settings->description,
        'robots' => 'index,follow',
        'language' => 'id',
        'revisitAfter' => '7 days',
        'author' => $settings->title,
        'keywords' =>
            'berita terkini, informasi terbaru, highlight, topik hangat, pencerahan, diskusi, fakta menarik, inspiratif, pemikiran baru, kejutan, pembaruan',
        'ogUrl' => url()->current(),
        'ogTitle' => $settings->title,
        'ogDescription' => $settings->description,
        'ogSiteName' => $settings->title,
        'ogType' => 'article',
        'ogImage' => Storage::url($settings->logo),
        'ogimageAlt' => $settings->title,
        'ogImageSecure' => Storage::url($settings->logo),
        'published_time' => now(),
        'modified_time' => now(),
        'twitterCreator' => $settings->title,
        'articleSection' => 'article',

        'twitterCard' => $settings->description,
        'twitterDomain' => url()->current(),
        'twitterUrl' => url()->current(),
        'twitterTitle' => $settings->title,
        'twitterDescription' => $settings->description,
        'twitterImage' => Storage::url($settings->logo),
    ])

    <title>{{ $title }}</title>
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="icon" type="image/x-icon" href="{{ asset($favicon) }}" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset($favicon) }}" />
    <link rel="canonical" href="{{ $canonical }}" />
    <meta name="description" content="{{ $description }}" />
    <meta content="all" name="robots" />
    <meta content="id" name="language" />
    <meta content="id" name="geo.country" />

    <meta http-equiv="content-language" content="In-Id" />
    <meta content="Indonesia" name="geo.placename" />
    <meta name="robots" content="{{ $robots }}" />
    <meta name="language" content="{{ $language }}" />
    <meta name="revisit-after" content="{{ $revisitAfter }}" />
    <meta content="index,follow" name="googlebot-news">
    <meta content="index,follow" name="googlebot">

    <!-- Opengraph Here -->
    <meta property="og:url" content="{{ $ogUrl }}">
    <meta name="keywords" content="{{ $keywords }}" />
    <meta name="author" content="{{ $author }}" />
    <meta property="og:title" content="{{ $ogTitle }}" />
    <meta property="og:description" content="{{ $ogDescription }}" />
    <meta property="og:site_name" content="{{ $ogSiteName }}">
    <meta property="og:type" content="{{ $ogType }}">

    <meta property="og:image" content="{{ asset($ogImage) }}">
    <meta property="og:image:type" content="image/jpeg">
    <meta property="og:image:alt" content="{{ $ogimageAlt }}">
    <meta property=”og:image:width” content=”180″ />
    <meta property=”og:image:height” content=”110″ />
    <meta property="og:image:secure_url" content="{{ asset($ogImage) }}">

    <meta property="og:locale" content="id_ID">
    <meta property="og:locale:alternate" content="en_US">
    <meta property="og:article:published_time" content="{{ $published_time }}">
    <meta property="og:article:modified_time" content="{{ $modified_time }}">
    <meta property="og:article:section" content="{{ $articleSection }}">
    <meta property="og:article:tag" content="{{ $articleSection }}">

    <!-- Twitter Opengraph Here -->
    <meta name="twitter:creator" content="{{ $twitterCreator }}">
    <meta name="twitter:card" content="summary_large_image">
    <meta property="twitter:domain" content="{{ $twitterDomain }}" />
    <meta property="twitter:url" content="{{ $twitterUrl }}" />
    <meta name="twitter:title" content="{{ $twitterTitle }}" />
    <meta name="twitter:description" content="{{ $twitterDescription }}" />
    <meta name="twitter:image" content="{{ asset($twitterImage) }}">
@endsection
