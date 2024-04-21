<?php

use function Livewire\Volt\{state, rules, computed, usesFileUploads};
use function Laravel\Folio\name;
use App\Models\Setting;

name('settings.advertisement');
usesFileUploads();

state([
    'setting' => fn() => Cache::remember('settings_admin_panel', today()->addDay(1), function () {
        return Setting::first();
    }),
]);

?>

<x-admin-layout>
    <x-seo-tags :title="'Pengaturan Website - Admin Panel'" />
    @include('layouts.editor')

    @volt
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Pengaturan</a>
                    </li>
                    <li class="breadcrumb-item active">Info Iklan</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('settings.advertisement') }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <div class="alert alert-primary d-flex" role="alert">
                                <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
                                        class="bx bx-command fs-6"></i></span>
                                <div class="d-flex flex-column ps-1">
                                    <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Tips!</h6>
                                    <p>Sebelum Anda mengisi "Info Iklan", kami ingin memberikan beberapa panduan
                                        yang
                                        penting:</p>
                                    <ul>
                                        <li>Pastikan informasi yang Anda masukkan akurat dan relevan dengan identitas dan
                                            misi
                                            website ini.
                                        </li>
                                        <li>Jangan masukkan informasi pribadi atau rahasia, seperti nomor telepon, alamat
                                            rumah,
                                            atau kata
                                            sandi.</li>
                                        <li>Pastikan untuk memeriksa kembali setiap detail sebelum menyimpannya.</li>
                                        <li>Informasi yang Anda masukkan akan ditampilkan di halaman "Info Iklan" dan
                                            dapat
                                            diakses oleh
                                            pengunjung website.</li>
                                    </ul>
                                    <p>Dengan memahami dan menyetujui panduan di atas, Anda dapat melanjutkan untuk mengisi
                                        profil
                                        "Tentang
                                        Kami".</p>

                                </div>
                            </div>
                            <label for="advertisement" class="form-label">Info Iklan
                                <span class="text-danger">*</span>
                            </label>
                            <textarea id="editor" class="form-control" name="advertisement" id="advertisement" rows="3">
                        {{ $setting->advertisement ?? null }}
                    </textarea>
                            @error('advertisement')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Submit
                        </button>


                    </form>
                </div>
            </div>
        </div>
    @endvolt
</x-admin-layout>
