@section('seo')
<!-- Meta Here -->
<title>{{ $seo['title'] ?? '' }}</title>
<link rel="icon" type="image/x-icon" href="{{ $seo['icon'] ?? '' }}" />
<link rel="canonical" href="{{ url()->current() }}" />
<meta name="description" content="{{ $seo['description'] ?? '' }}" />
<meta name="robots" content="index,follow" />
<meta name="language" content="id" />
<meta name="revisit-after" content="7 days" />
<meta name="author" content="{{ $seo['title'] ?? '' }}" />
<meta name="keywords" content="{{ $seo['keywords'] ?? '' }}" />



<!-- Opengraph Here -->
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $seo['title'] ?? '' }}" />
<meta property="og:description" content="{{ $seo['description'] ?? '' }}" />
<meta property="og:site_name" content="{{ $seo['title'] ?? '' }}">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ $seo['logo'] ?? 'path/to/logo.png' }}">

<!-- Twitter Opengraph Here -->
<meta name="twitter:card" content="summary_large_image" />
<meta property="twitter:domain" content="{{ url()->current() }}" />
<meta property="twitter:url" content="{{ url()->current() }}" />
<meta name="twitter:title" content="{{ $seo['title'] ?? '' }}" />
<meta name="twitter:description" content="{{ $seo['description'] ?? '' }}" />
<meta name="twitter:image" content="{{ $seo['logo'] ?? 'path/to/logo.png' }}">
@endsection
