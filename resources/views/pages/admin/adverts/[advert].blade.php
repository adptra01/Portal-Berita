<?php

use function Livewire\Volt\{state, rules};
use function Laravel\Folio\name;
use App\Models\Advert;

name('adverts.edit');

$destroy = function (advert $advert) {
    Storage::delete($advert->image);
    $advert->delete();
    return redirect()->route('adverts.index')->with('success', 'Proses Berhasil Dilakukan 😁!');
};

state(['advert']);

?>

<x-admin-layout>

    @volt
        <div>
            <x-seo-tags :title="$advert->name" />
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Iklan</a>
                    </li>
                    <li class="breadcrumb-item active">{{ $advert->name }}</li>
                </ol>
            </nav>
            <div class="nav-align-top">
                <ul class="nav nav-pills mb-3 row" role="tablist">
                    <li class="nav-item col-md">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-preview" aria-controls="navs-pills-top-preview"
                            aria-selected="true">
                            <i class='bx bxs-dock-top'></i>
                            Keterangan
                        </button>
                    </li>
                    <li class="nav-item col-md">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-edit" aria-controls="navs-pills-top-edit" aria-selected="false">
                            <i class='bx bx-edit'></i>
                            Edit Iklan</button>
                    </li>
                    <li class="nav-item col-md">
                        <button class="nav-link" role="tab" data-bs-toggle="tab"
                            wire:click='destroy({{ $advert->id }})'
                            wire:confirm.prompt="Yakin Ingin Menghapus?\n\nTulis 'hapus' untuk konfirmasi!|hapus"
                            wire:loading.attr="disabled">
                            <i class='bx bx-trash'></i>
                            Hapus Iklan</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-top-preview" role="tabpanel">

                        <div class="mb-3">
                            <p class="col-md-3 fw-bold">Gambar Iklan</p>
                            <img src="{{ Storage::url($advert->image) }}" alt="{{ $advert->name }}"
                                class="w-100 border border-5 border-secondary rounded">
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-3 fw-bold">ID</p>
                            <div class="col-md-9">
                                <p>: {{ $advert->id }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-3 fw-bold">Nama Iklan</p>
                            <div class="col-md-9">
                                <p>: {{ $advert->name }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-3 fw-bold">Link Iklan</p>
                            <div class="col-md-9">
                                <p class="text-capitalize">:
                                    <a href="{{ $advert->link }}">{{ $advert->link }}</a>
                                </p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-3 fw-bold">Jumlah Klik</p>
                            <div class="col-md-9">
                                <p class="text-capitalize">: {{ $advert->click }} Kali</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-3 fw-bold">Posisi/Letak</p>
                            <div class="col-md-9">
                                <p class="text-capitalize">: {{ $advert->position }}

                                    @if ($advert->position == 'top')
                                        (Atas)
                                    @elseif($advert->position == 'side')
                                        (Samping)
                                    @elseif($advert->position == 'popup')
                                        (Muncul Tiba-tiba)
                                    @endif
                                </p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-3 fw-bold">Tanggal Mulai</p>
                            <div class="col-md-9">
                                <p class="text-capitalize">:
                                    {{ Carbon\Carbon::parse($advert->start_date)->format('d M Y') }} </p>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <p class="col-md-3 fw-bold">Tanggal Berakhir</p>
                            <div class="col-md-9">
                                <p class="text-capitalize">:
                                    {{ Carbon\Carbon::parse($advert->end_date)->format('d M Y') }} </p>
                            </div>
                        </div>


                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-edit" role="tabpanel">
                        <div class="alert alert-primary" role="alert">
                            <h6 class="alert-heading text-center fw-bold mb-1">
                                Informasi!
                            </h6>

                            <ul>
                                <li>
                                    Jika iklan tidak dilengkapi dengan tautan atau Link, gunakan tanda pagar
                                    (#)
                                    untuk
                                    mengisi
                                    kolom tautan iklan.
                                </li>
                                <li>
                                    Jangan mengunggah gambar iklan yang sama kecuali ada perubahan yang ingin
                                    dilakukan pada gambar iklan tersebut.
                                </li>
                                <li>
                                    Hanya iklan yang memiliki tanggal berakhir yang belum melewati hari ini yang akan
                                    ditampilkan.
                                </li>
                            </ul>
                        </div>

                        @include('pages.admin.adverts.edit')

                    </div>
                </div>
            </div>
        </div>
    @endvolt

</x-admin-layout>
