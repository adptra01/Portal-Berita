<?php

use function Livewire\Volt\{state, mount};
use function Laravel\Folio\name;
use App\Models\User;
use App\Models\Setting;

name('news.instruction');

state([
    'aboutUs' => fn() => Setting::select('about')->first()->about ?? null,
    'teams' => fn() => User::where('role', 'Penulis')->select('name', 'role')->get(),
]);

?>

<x-guest-layout>
    <x-seo-tags :title="'Tentang Kami - sibanyu Portal Berita Terkini'" :description="'sibanyu Portal Berita Terkini - Memberikan informasi terbaru seputar berita terkini dari berbagai kategori.'" :keywords="'tentang kami, Sibanyu, berita, terkini, informasi'" />

    @include('layouts.style-post')
    @volt
        <div>
            <div class="container py-5">
                <div class="text-base">
                    <h2 class="fw-bold text-center">Tentang Kami</h2>
                    <div class="ck-content">
                        {!! $aboutUs !!}
                    </div>
                </div>
            </div>

        </div>
    @endvolt

</x-guest-layout>
