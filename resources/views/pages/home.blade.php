<x-admin-layout>
    <x-slot name="title">Dashboard</x-slot>
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
        <div class="col-md">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        {!! $chartPost->container() !!}

                        <script src="{{ $chartPost->cdn() }}"></script>

                        {{ $chartPost->script() }}
                    </div>
                    <div class="row">

                    </div>
                </div>
            </div>
        </div>
        <div class="col-md">
            <div class="card mb-3">
                <div class="card-body">
                    {!! $chartTopViewerPost->container() !!}

                    {{ $chartTopViewerPost->script() }}
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md"> style="height: 20%"

            <div class="card mb-3">
                <div class="card-body">
                    <p class="fw-bold">Total Berita Penulis</p>
                    <div class="table-responsive border rounded">
                        <table class="table table-striped table-sm text-center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Penulis</th>
                                    <th>Total Berita</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countPostsWriter as $no => $item)
                                    <tr>
                                        <td>{{ ++$no }}.</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->posts->count() }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md" style="height: 20%">
            <div class="card mb-3">
                <div class="card-body">
                    <p class="fw-bold">Total Iklan</p>
                    <div class="table-responsive border rounded">
                        <table class="table table-striped table-sm text-center">
                            <thead>
                                <tr>
                                    <th>Posisi</th>
                                    <th>Jumlah Iklan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countAdvertsByPosition as $position => $count)
                                    <tr>
                                        <td>{{ $position }}</td>
                                        <td>{{ $count }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md" style="height: 20%">
            <div class="card mb-3">
                <div class="card-body">
                    <p class="fw-bold">Total Iklan</p>
                    <div class="table-responsive border rounded">
                        <table class="table table-striped table-sm text-center">
                            <thead>
                                <tr>
                                    <th>Posisi</th>
                                    <th>Jumlah Iklan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($countAdvertsByPosition as $position => $count)
                                    <tr>
                                        <td>{{ $position }}</td>
                                        <td>{{ $count }}</td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-admin-layout>
