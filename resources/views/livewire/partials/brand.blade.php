<?php

use function Livewire\Volt\{state, mount};
use App\Models\Setting;

state([
    'setting' => fn() => Cache::remember('settings', now()->addDays(1), function () {
            return Setting::select('title', 'description', 'logo', 'contact', 'whatsapp')->first();
    }),
]);
?>

<div>
    @section('header')
        @if ($setting)
            @if ($setting->logo)
                <img src="{{ Storage::url($setting->logo) }}" alt="Logo" width="100" height="100%"
                    class="d-inline-block align-text-top">
            @else
                <span class="fw-bold text-primary fs-2">{{ $setting->title ?? '' }}</span>
            @endif
        @endsection
    @endif

    @section('footer')
        <div class="container">
            <div class="row justify-content-between pt-4 pb-3 pb-lg-5">
                @if ($setting)
                    <div class="col-12 col-lg-7">
                        @if ($setting->logo)
                            <a href="/">
                                <img alt="Free Frontend Logo" class="img-fluid mb-3" height="auto"
                                    src="{{ Storage::url($setting->logo) }}" width="200">
                            </a>
                        @else
                            <p class="fw-bold text-primary fs-2">{{ $setting->title ?? '' }}</p>
                        @endif
                        <p class="mb-3">{{ $setting->description ?? '' }}</p>

                    </div>

                    <div class="col-12 col-lg-3 pt-1 small text-lg-end">
                        <p class="mb-1">Jalintim Palembang Jambi Km 205, RT 08 Kel. Bayung Lencir, Kec. Bayung Lencir,
                            Musi
                            Banyuasin, Sumsel 30756</p>
                        <p class="mb-1">{{ $setting->contact ?? '' }}</p>
                        <p class="mb-0">
                            <a class="text-dark text-decoration-none" href="https://wa.me/{{ $setting->whatsapp ?? '#' }}">
                                <span class="text-primary">
                                    {{ $setting->whatsapp ?? '' }}
                                </span>
                            </a>
                        </p>
                    </div>
                @endif

            </div>
            <div class="border-top d-lg-none"></div>
            <div class="d-lg-flex justify-content-between py-3">
                <div class="small">
                    <span class="d-block d-lg-inline text-muted mb-2 mb-lg-0 me-lg-5">
                        Copyright © PT. Tama Media Desa (PT. TMD)
                    </span>
                </div>
            </div>
        </div>
    @endsection
</div>
