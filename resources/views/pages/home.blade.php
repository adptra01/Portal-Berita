<x-admin-layout>
    <x-seo-tags :title="'Beranda - Admin Panel'" />

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">Beranda</li>
        </ol>
    </nav>
    <div class="card mb-3">
        <div class="d-flex align-items-end row">
            <div class="col-sm-7">
                <div class="card-body">
                    <h5 class="card-title text-primary">Hallo {{ auth()->user()->name }}! 🎉</h5>
                    <p class="mb-4">
                        Anda memiliki
                        {{ auth()->user()->role == 'Admin' ? $countPost : $writerCountPost }}
                        Berita
                        hari ini. Periksa daftar Berita di menu berita untuk lihat lengkap.
                    </p>

                </div>
            </div>
            <div class="col-sm-5 text-center text-sm-left">
                <div class="card-body pb-0 px-0 px-md-4">
                    <img src="/admin/img/illustrations/man-with-laptop-light.png" height="140" alt="View Badge User"
                        data-app-dark-img="illustrations/man-with-laptop-dark.png"
                        data-app-light-img="illustrations/man-with-laptop-light.png">
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        {{-- Pengunjung Hari Ini --}}
        <div class="col-md mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="bx bx-calendar-alt bx-border fs-1"></i>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Pengunjung</small>
                                <h6 class="mb-0">Hari Ini</h6>
                            </div>
                            <h1 class="mb-0">{{ $visitorCounts['today'] }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pengunjung Minggu Ini --}}
        <div class="col-md mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="bx bxs-calendar-alt bx-border fs-1"></i>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Pengunjung</small>
                                <h6 class="mb-0">Minggu Ini</h6>
                            </div>
                            <h1 class="mb-0">{{ $visitorCounts['thisWeek'] }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pengunjung Bulan Ini --}}
        <div class="col-md mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="bx bxs-calendar-alt bx-border fs-1"></i>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Pengunjung</small>
                                <h6 class="mb-0">Bulan Ini</h6>
                            </div>
                            <h1 class="mb-0">{{ $visitorCounts['thisMonth'] }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Pengunjung Tahun Ini --}}
        <div class="col-md mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="bx bx-calendar-alt bx-border fs-1"></i>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Pengunjung</small>
                                <h6 class="mb-0">Tahun Ini</h6>
                            </div>
                            <h1 class="mb-0">{{ $visitorCounts['thisYear'] }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Total Pengunjung --}}
        <div class="col-md mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex">
                        <div class="me-3">
                            <i class="bx bxs-calendar-alt bx-border fs-1"></i>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <small class="text-muted d-block mb-1">Pengunjung</small>
                                <h6 class="mb-0">semua</h6>
                            </div>
                            <h1 class="mb-0">{{ $visitorCounts['all'] }}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="card mb-3">
        <div class="card-body">
            <div class="row">

                <div class="col-md">
                    {!! $chartPost->container() !!}

                    <script src="{{ $chartPost->cdn() }}"></script>

                    {{ $chartPost->script() }}
                </div>

                <div class="col-md">
                    {!! $chartTopViewerPost->container() !!}

                    {{ $chartTopViewerPost->script() }}
                </div>
            </div>
        </div>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            {!! $chartPostsWriter->container() !!}

            {{ $chartPostsWriter->script() }}
        </div>
    </div>

    @if (auth()->user()->role === 'admin')
        <div class="row">
            <div class="col-md mb-3">
                <div class="card h-100">
                    <div class="card-body">
                        {!! $chartAdvertsByPosition->container() !!}

                        {{ $chartAdvertsByPosition->script() }}
                    </div>
                </div>
            </div>

            <div class="col-md">
                <div class="card mb-3 h-100">
                    <div class="card-body">
                        {!! $chartTotalUser->container() !!}

                        {{ $chartTotalUser->script() }}
                    </div>
                </div>
            </div>
        </div>
    @endif

</x-admin-layout>
