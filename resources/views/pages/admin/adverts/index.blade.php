<?php
use function Livewire\Volt\{state, computed};
use function Laravel\Folio\name;
use App\Models\Advert;

name('adverts.index');

state([]);

$adverts = computed(function () {
    return Advert::latest()->select('id', 'name', 'position', 'start_date', 'end_date')->get();
});

?>
<x-admin-layout>
    <x-seo-tags :title="'Iklan - Admin Panel'" />
    @include('layouts.table')

    @volt
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Iklan</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('adverts.create') }}" class="btn btn-primary">
                        Tambah</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table wrap" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Posisi/Letak</th>
                                    <th>Tanggal Mulai</th>
                                    <th>Tanggal Berakhir</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($this->adverts as $advert)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>

                                        <td>
                                            {{ $advert->name }}
                                        </td>
                                        <td>
                                            <span class="text-capitalize">
                                                {{ ucfirst($advert->position) }}

                                                ({{ $advert->position === 'top' ? 'Atas' : ($advert->position === 'side' ? 'Samping' : 'Muncul Tiba-tiba') }})
                                            </span>
                                        </td>

                                        <td>
                                            {{ Carbon\Carbon::parse($advert->start_date)->format('d M Y') }} </p>
                                        </td>
                                        <td>
                                            {{ Carbon\Carbon::parse($advert->end_date)->format('d M Y') }} </p>
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
