<ul class="menu-inner py-1">

    <li class="menu-item {{ request()->is('home') ? 'active' : '' }}">
        <a href="/home" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="home">Home</div>
        </a>
    </li>

    <li class="menu-item {{ request()->is('categories') ? 'active' : '' }}">
        <a href="{{ route('categories.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-copy"></i>
            <div data-i18n="categories">Kategori</div>
        </a>
    </li>

    <li class="menu-item {{ request()->is('posts') ? 'active' : '' }}">
        <a href="{{ route('posts.index') }}" class="menu-link">
            <i class="menu-icon tf-icons bx bx-file"></i>
            <div data-i18n="categories">Berita</div>
        </a>
    </li>
</ul>
