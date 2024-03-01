<?php
use function Livewire\Volt\{state, computed};
use function Laravel\Folio\name;
use App\Models\Advert;

name('adverts.index');

state([]);

$adverts = computed(function () {
    return Advert::latest()->select('id', 'name', 'position', 'start_date', 'end_date', 'status')->get();
});

?>
<x-admin-layout>
    <x-slot name="title">Advers Menus</x-slot>
    @include('layouts.table')

    @volt
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Buat Iklan</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('adverts.create') }}" class="btn btn-primary">
                        Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table nowrap" style="font-size: 13px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Posisi/Letak</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Berakhir</th>
                                    <th>Status</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($this->adverts as $no => $advert)
                                    <tr>
                                        <td>
                                            {{ ++$no }}.
                                        </td>
                                        <td>
                                            {{ $advert->name }}
                                        </td>
                                        <td>
                                            <span class="text-capitalize">
                                                {{ $advert->position }}
                                            </span>

                                            @if ($advert->position == 'top')
                                                (Atas)
                                            @elseif($advert->position == 'side')
                                                (Samping)
                                            @elseif($advert->position == 'popup')
                                                (Muncul Tiba-tiba)
                                            @endif
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($advert->start_date)->format('d M Y') }} </p>
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($advert->end_date)->format('d M Y') }} </p>
                                        </td>
                                        <td>
                                            <span class="badge bg-{{ $advert->status == 1 ? 'success' : 'danger' }}">
                                                {{ $advert->status == 1 ? 'Aktif' : 'Non Aktif' }}
                                            </span>

                                        </td>
                                        <td>
                                            <a href="{{ route('adverts.edit', ['advert' => $advert->id]) }}"
                                                class="btn btn-outline-primary btn-sm">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endvolt
</x-admin-layout>
