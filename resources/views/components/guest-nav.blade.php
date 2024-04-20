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
        <a class="nav-link active" aria-current="page" href="{{ route('news.about-us') }}">Tentang
            Kami</a>
    </li>

    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('news.advert') }}">Info Iklan</a>
    </li>

    <li class="nav-item">
        <a class="nav-link active" aria-current="page" href="{{ route('news.contact') }}">Kontak</a>
    </li>
</ul>

<div class="d-flex gap-3">

    @auth
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="genric-btn danger-border rounded">Logout</button>
        </form>
    @else
        <div>
            <a class="genric-btn primary-border rounded small" href="{{ route('redirect') }}">
                Login
            </a>
        </div>
    @endauth

</div>
