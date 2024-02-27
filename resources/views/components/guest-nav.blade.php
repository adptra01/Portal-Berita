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
                    <a href="{{ route('categories.index') }}" class="text-black text-capitalize">
                        <i class='bx bxs-circle bx-xs'></i>
                        Semua
                    </a>
                </div>
                @foreach ($categories as $category)
                    <div class="col-md-6 py-2">
                        <a href="{{ route('categories.slug', ['category' => $category->slug]) }}"
                            class="text-black text-capitalize">
                            <i class='bx bxs-circle bx-xs'></i>
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
        <i class='bx bx-search bx-sm'></i>
    </a>
</span>
