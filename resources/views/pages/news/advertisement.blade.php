<?php

use function Livewire\Volt\{state, computed};
use function Laravel\Folio\name;
use App\Models\Setting;

name('news.advertisement');

state([
    'settingPages' => fn() => Cache::remember('settingPages', 30, function () {
        return Setting::select('advertisement', 'mediaGuidelines', 'about')->first() ?? null;
    }),
]);

?>

<x-guest-layout>
    <x-seo-tags :title="'Info Iklan - sibanyu Portal Berita Terkini'" :description="'Pasang iklan di sibanyu Portal Berita Terkini dan jangkau pembaca lebih luas!'" :keywords="'pasang iklan, iklan online, iklan berita, Sibanyu, jangkau pelanggan, target audiens, peluang terbaik'" />


    @volt
    @include('layouts.style-post')
        <div>
            <div class="container py-5">
                <div class="text-base">
                    <h2 class="fw-bold text-center">Info Iklan</h2>
                    <div class="ck-content">
                        {!! $settingPages->advertisement !!}
                    </div>
                </div>
            </div>
        </div>
    @endvolt

</x-guest-layout>
