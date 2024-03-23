<?php

use function Livewire\Volt\{state, rules, computed, usesFileUploads};
use function Laravel\Folio\name;
use App\Models\Setting;

name('settings.index');
usesFileUploads();

state([
    'setting' => fn() => Setting::first(),
]);

?>

<x-admin-layout>
    <x-seo-tags :title="'Pengaturan Website - Admin Panel'" />
    @include('layouts.editor')
    @include('layouts.report')

    @volt
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Pengaturan</li>
                </ol>
            </nav>
            <div class="nav-align-top">
                <ul class="nav nav-pills mb-3" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-profile" aria-controls="navs-pills-top-profile"
                            aria-selected="false">Profile</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-about-us" aria-controls="navs-pills-top-about-us"
                            aria-selected="false">Tentang Kami</button>
                    </li>
                </ul>
                <div class="tab-content">

                    <div class="tab-pane fade show active" id="navs-pills-top-profile" role="tabpanel">
                        @include('pages.admin.settings.profile')
                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-about-us" role="tabpanel">
                        @include('pages.admin.settings.about-us')
                    </div>
                </div>
            </div>
        </div>
    @endvolt
</x-admin-layout>
