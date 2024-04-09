<?php

use function Livewire\Volt\{state, mount};
use function Laravel\Folio\name;
use App\Models\User;
use App\Models\Setting;

name('news.about-us');

state([
    'aboutUs' => fn() => Setting::select('about')->first()->about ?? null,
    'teams' => fn() => User::where('role', 'Penulis')->get(),
]);

?>

<x-guest-layout>
    <x-seo-tags :title="'Tentang Kami - sibanyu Portal Berita Terkini'" :description="'sibanyu Portal Berita Terkini - Memberikan informasi terbaru seputar berita terkini dari berbagai kategori.'" :keywords="'tentang kami, Sibanyu, berita, terkini, informasi'" />

    @include('layouts.style-post')
    @volt
        <div>
            <div class="container py-5">
                <div class="text-base text-center">
                    <h2 class="fw-bold">Tentang Kami</h2>
                    <div class="ck-content">
                        {!! $aboutUs !!}
                    </div>
                </div>
            </div>

            <section class="py-5">
                <div class="container">
                    <div class="row justify-content-center text-center mb-2 mb-lg-4">
                        <div class="col-12 col-lg-8 col-xxl-7 text-center mx-auto">
                            <h2 class="fw-bold">Bersama Tim</h2>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @foreach ($teams as $team)
                            <div class="col-md-6 col-lg-3">
                                <div class="card text-center border-0 mb-3">
                                    <div class="card-body p-3">
                                        <div class="mb-4 mx-lg-3 mx-xxl-5">
                                            <img class="img-fluid rounded-circle w-50"
                                                src="https://api.dicebear.com/7.x/lorelei/svg?seed={{ $team->name }}"
                                                alt="{{ $team->name }}" loading="eager">
                                        </div>
                                        <h5 class="fw-bold">{{ $team->name }}</h5>
                                        <div class="text-muted">
                                            {{ $team->role }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>

        </div>
    @endvolt

</x-guest-layout>
