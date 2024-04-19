<?php

use function Livewire\Volt\{state, mount};
use App\Models\Setting;

state([
    'setting' => fn() => Cache::remember('brand_partial', now()->addDays(1), function () {
        return Setting::select('title', 'description', 'logo', 'contact', 'whatsapp', 'facebook', 'instagram', 'twitter', 'youtube', 'tiktok')->first();
    }),
]);
?>

<div>
    @section('header')
        @if ($setting->logo)
            <img src="{{ Storage::url($setting->logo) }}" alt="Logo" width="100" height="100%"
                class="d-inline-block align-text-top">
        @else
            <span class="fw-bold text-primary fs-2">{{ $setting->title ?? '' }}</span>
        @endif
    @endsection

    @section('footer')
        <div class="container pt-5 mt-5 border-top border-5">
            @if ($setting->logo)
                <a href="/">
                    <img alt="Free Frontend Logo" class="img-fluid mb-3" height="auto"
                        src="{{ Storage::url($setting->logo) }}" width="200">
                </a>
            @else
                <p class="fw-bold text-primary fs-2">{{ $setting->title ?? '' }}</p>
            @endif

            <div class="row justify-content-between pb-3 pb-lg-5">
                <div class="col-12 col-lg-7">
                    <p class="mb-3">{{ $setting->description ?? '' }}</p>
                </div>

                <div class="col col-lg-auto">
                    <p class="fw-semibold">Selalu Terhubung Dengan Kami</p>
                    <div class="d-flex justify-content-between">

                        @foreach (['facebook', 'instagram', 'youtube', 'tiktok', 'twitter'] as $social)
                            <a target="_blank" rel="noopener noreferrer" href="{{ $setting->$social ?? '' }}"
                                class="text-dark {{ !$setting->$social ? 'd-none' : '' }}">
                                <i class="bx bxl-{{ $social }} fs-2 "></i>
                            </a>
                        @endforeach

                    </div>
                </div>
            </div>

            <div class="border-top d-lg-none"></div>

            <div class="d-lg-flex justify-content-between py-3">
                <div class="small">
                    <span class="text-muted">
                        {{ $setting->copyright ?? '' }}
                    </span>
                </div>
                <div class="small">

                    @foreach (['Beranda' => '/', 'Tentang Kami' => route('news.about-us'), 'Info Iklan' => route('news.advert'), 'Kontak' => route('news.contact'), 'Pedoman Media Siber' => route('news.instruction')] as $label => $route)
                        <a class="d-block d-lg-inline text-muted mb-2 mb-lg-0 me-lg-3" href="{{ $route }}">
                            {{ $label }}
                        </a>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
</div>
