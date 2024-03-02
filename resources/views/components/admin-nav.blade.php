<ul class="menu-inner py-1">
    <li class="menu-item {{ request()->is('home') ? 'active' : '' }}">
        <a href="/home" class="menu-link">
            <i class="menu-icon tf-icons bx bx-home-circle"></i>
            <div data-i18n="home">Beranda</div>
        </a>
    </li>
    @if (auth()->user()->role == 'Penulis')
        <li class="menu-item {{ request()->is('writer/posts') ? 'active' : '' }}">
            <a href="{{ route('writer-posts.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="categories">Berita</div>
            </a>
        </li>
    @elseif (auth()->user()->role == 'Admin')
        <li class="menu-item {{ request()->is('admin/posts') ? 'active' : '' }}">
            <a href="{{ route('posts.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-file"></i>
                <div data-i18n="categories">Berita</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/posts/categories') ? 'active' : '' }}">
            <a href="{{ route('posts.categories') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-copy"></i>
                <div data-i18n="categories">Kategori</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/comments') ? 'active' : '' }}">
            <a href="{{ route('comments.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-comment"></i>
                <div data-i18n="categories">Komentar</div>
            </a>
        </li>


        <li class="menu-item {{ request()->is(['admin/users', 'admin/users/*']) ? 'active' : '' }}">
            <a href="{{ route('users.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="users">Akun Pengguna</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is(['admin/adverts', 'admin/adverts/*']) ? 'active' : '' }}">
            <a href="{{ route('adverts.index') }}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-award"></i>
                <div data-i18n="categories">Iklan</div>
            </a>
        </li>

        <li class="menu-item {{ request()->is('admin/reports/*') ? 'active' : '' }}">
            <a href="javascript:void(0)" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bxs-file-archive"></i>
                <div>Laporan</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('reports.users') }}" class="menu-link">
                        <div>Akun Pengguna</div>
                    </a>
                </li>
                <li class="menu-item">
                    <a href="{{ route('reports.posts') }}" class="menu-link">
                        <div>Berita</div>
                    </a>
                </li>
            </ul>
        </li>
    @endif
</ul>
