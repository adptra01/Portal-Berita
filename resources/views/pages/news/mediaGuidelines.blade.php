<?php

use function Livewire\Volt\{state, computed};
use function Laravel\Folio\name;
use App\Models\Setting;

name('news.mediaGuidelines');

state([
    'settingPages' => fn() => Cache::remember('settingPages', 30, function () {
        return Setting::select('advertisement', 'mediaGuidelines', 'about')->first() ?? null;
    }),
]);

?>

<x-guest-layout>
    <x-seo-tags :title="'Pedoman Media Siber - sibanyu Portal Berita Terkini'" />

    @include('layouts.style-post')

    @volt
        <div>
            {{-- <style>
                .ck-content ul {
                    list-style-type: disc;
                    color: hsl(0, 0%, 30%);
                    padding-left: 20px;
                }

                .ck-content ul li {
                    margin-bottom: 10px;
                    color: hsl(0, 0%, 30%);
                }

                /* Warna untuk bullet */
                .ck-content ul li::before {
                    content: "\2022";
                    /* kode untuk bullet titik */
                    color: hsl(0, 0%, 0%);
                    /* warna bullet */
                    font-size: 18px;
                    margin-right: 10px;
                }
            </style> --}}
            <div class="container py-5">
                <div class="text-base">
                    <h2 class="fw-bold text-center">Pedoman Media Siber</h2>
                    <div class="ck-content">
                        {!! $settingPages->mediaGuidelines !!}
                    </div>
                </div>
            </div>
        </div>
    @endvolt

</x-guest-layout>
