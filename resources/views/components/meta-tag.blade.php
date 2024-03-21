<!-- Meta Here -->
<title>{{ $title ?? '' }} - Portal Berita Terkini</title>
<link rel="icon" type="image/x-icon" href="{{ $icon ?? '' }}" />
<meta name="description" content="{{ $description ?? '' }}" />
<meta name="robots" content="index,follow" />
<meta name="language" content="id" />
<meta name="revisit-after" content="7 days" />
<meta name="author" content="{{ $title ?? '' }}" />

<!-- Opengraph Here -->
<meta property="og:url" content="{{ url()->current() }}">
<meta property="og:title" content="{{ $title ?? '' }} - Portal Berita Terkini" />
<meta property="og:description" content="{{ $description ?? '' }}" />
<meta property="og:site_name" content="{{ $title ?? '' }} - Portal Berita Terkini">
<meta property="og:type" content="website">
<meta property="og:image" content="{{ $logo ?? 'path/to/logo.png' }}">

<!-- Twitter Opengraph Here -->
<meta name="twitter:card" content="summary_large_image" />
<meta property="twitter:domain" content="{{ url()->current() }}" />
<meta property="twitter:url" content="{{ url()->current() }}" />
<meta name="twitter:title" content="{{ $title ?? '' }} - Portal Berita Terkini" />
<meta name="twitter:description" content="{{ $description ?? '' }}" />
<meta name="twitter:image" content="{{ $logo ?? 'path/to/logo.png' }}">
