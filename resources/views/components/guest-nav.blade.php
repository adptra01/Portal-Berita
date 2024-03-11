<ul class="navbar-nav me-auto mb-2 mb-lg-0">

    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="/">Beranda</a>
    </li>

    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle text-black" href="#" role="button" data-bs-toggle="dropdown"
            aria-expanded="false">
            Kategori Berita
        </a>
        <div class="dropdown-menu px-3 pt-3 rounded-3 border-0 shadow">
            <div class="row">
                <div class="col-md-6 py-2">
                    <a href="{{ route('categories.index') }}" class="text-dark text-capitalize">
                        Berita Utama
                    </a>
                </div>
                @foreach ($categories as $category)
                    <div class="col-md-6 py-2">
                        <a href="{{ route('categories.slug', ['category' => $category->slug]) }}"
                            class="text-dark text-capitalize">
                            {{ $category->name }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('news.about-us') }}" wire:navigate>Tentang
            Kami</a>
    </li>

    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('news.advert') }}" wire:navigate>Info Iklan</a>
    </li>

    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('news.contact') }}" wire:navigate>Kontak</a>
    </li>
</ul>

<span class="navbar-text">
    <a href="{{ route('news.all-post') }}">
        <i class='bx bx-search bx-sm mt-lg-2'></i>
    </a>
</span>

@auth
    <div class="dropdown px-lg-3 pt-2 pt-lg-0">
        <img src="https://api.dicebear.com/7.x/lorelei/svg?seed={{ auth()->user()->name }}"
            class="border rounded-circle dropdown-toggle" data-bs-toggle="dropdown" data-bs-auto-close="true"
            aria-expanded="false" href="#" alt="{{ auth()->user()->name }}" width="40">

        <ul class="dropdown-menu border-0 " style="--bs-dropdown-min-width: auto;">
            <li>
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">Logout</a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li>
        </ul>
    </div>
@else
    <form class="d-block px-lg-3">
        <a class="genric-btn primary-border rounded small" href="/login">Login</a>
    </form>
@endauth
