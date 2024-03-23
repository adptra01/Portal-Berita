@section('seo')
    @props([
        'title' => $settings->title ?? '',
        'favicon' => $settings->icon ?? '',
        'canonical' => url()->current(),
        'description' => $settings->description ?? '',
        'robots' => 'index,follow',
        'language' => 'id',
        'revisitAfter' => '7 days',
        'author' => $settings->title ?? '',
        'keywords' =>
            'berita terkini, informasi terbaru, highlight, topik hangat, pencerahan, diskusi, fakta menarik, inspiratif, pemikiran baru, kejutan, pembaruan',

        'ogUrl' => url()->current(),
        'ogTitle' => $settings->title ?? '',
        'ogDescription' => $settings->description ?? '',
        'ogSiteName' => $settings->title ?? '',
        'ogType' => 'website',
        'ogImage' => $settings->logo ?? '',

        'twitterCard' => 'summary_large_image',
        'twitterDomain' => url()->current(),
        'twitterUrl' => url()->current(),
        'twitterTitle' => $settings->title ?? '',
        'twitterDescription' => $settings->description ?? '',
        'twitterImage' => $settings->logo ?? '',
    ])

    <title>{{ $title }}</title>
    <link rel="icon" type="image/x-icon" href="{{ $favicon }}" />
    <link rel="canonical" href="{{ $canonical }}" />
    <meta name="description" content="{{ $description }}" />
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
