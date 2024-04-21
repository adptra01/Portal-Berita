<?php

use function Livewire\Volt\{state, computed};
use function Laravel\Folio\name;
use App\Models\Setting;

name('news.mediaGuidelines');

state([
    'settingPages' => fn() => Cache::remember('settingPages', now()->addWeeks(), function () {
        return Setting::select('advertisement', 'mediaGuidelines', 'about')->first() ?? null;
    }),
]);

?>

<x-guest-layout>
    <x-seo-tags :title="'Pedoman Media Siber - sibanyu Portal Berita Terkini'" />

    @include('layouts.style-post')

    @volt
        <div>
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
