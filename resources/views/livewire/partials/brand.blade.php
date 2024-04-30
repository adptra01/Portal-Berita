<?php

use function Livewire\Volt\{state, mount};
use App\Models\Setting;

state([
    'setting' => fn() => Cache::remember('brand_partial', now()->addWeeks(), function () {
        return Setting::select('title', 'description', 'logo', 'copyright', 'facebook', 'instagram', 'twitter', 'youtube', 'tiktok')->first();
    }),
]);
?>

<div>
    @section('header')
        @if ($setting->logo)
            <img src="{{ Storage::url($setting->logo) }}" alt="Logo" width="150" class="d-inline-block align-text-top">
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
                                @if ($social === 'twitter')
                                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="30"
                                        fill="currentColor" class="bi bi-twitter-x" viewBox="0 0 16 16">
                                        <path
                                            d="M12.6.75h2.454l-5.36 6.142L16 15.25h-4.937l-3.867-5.07-4.425 5.07H.316l5.733-6.57L0 .75h5.063l3.495 4.633L12.601.75Zm-.86 13.028h1.36L4.323 2.145H2.865z" />
                                    </svg>
                                @else
                                    <i class="bx bxl-{{ $social }} fs-2 "></i>
                                @endif
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

                    @foreach (['Beranda' => '/', 'Tentang Kami' => route('news.about-us'), 'Info Iklan' => route('news.advertisement'), 'Kontak' => route('news.contact'), 'Pedoman Media Siber' => route('news.mediaGuidelines')] as $label => $route)
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
