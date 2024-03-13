<?php
use function Livewire\Volt\{state};
use function Laravel\Folio\name;
use App\Models\Post;

name('admin.home');

state(['countPost' => fn() => Post::count(), 'writerCountPost' => fn() => Post::where('user_id', auth()->user()->id)->count()]);

?>
<x-admin-layout>
    <x-slot name="title">Dashboard</x-slot>
    @volt
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active">Beranda</li>
                </ol>
            </nav>
            <div class="card">
                <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                        <div class="card-body">
                            <h5 class="card-title text-primary">Congratulations {{ auth()->user()->name }}! 🎉</h5>
                            <p class="mb-4">
                                Anda memiliki
                                {{ auth()->user()->role == 'admin' ? $countPost : $writerCountPost }}
                                Berita
                                hari ini. Periksa daftar Berita di menu berita untuk lihat lengkap.
                            </p>

                        </div>
                    </div>
                    <div class="col-sm-5 text-center text-sm-left">
                        <div class="card-body pb-0 px-0 px-md-4">
                            <img src="/admin/img/illustrations/man-with-laptop-light.png" height="140"
                                alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                                data-app-light-img="illustrations/man-with-laptop-light.png">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endvolt
</x-admin-layout>
