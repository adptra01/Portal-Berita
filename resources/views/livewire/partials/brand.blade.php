<?php

use function Livewire\Volt\{state, mount};
use App\Models\Setting;

state(['setting' => fn() => Setting::select('title', 'description', 'logo', 'contact', 'whatsapp')->first()]);
?>

<div>
    @section('header')
        @if ($setting && $setting->logo)
            <img src="{{ Storage::url($setting->logo) }}" alt="Logo" width="100" height="100%"
                class="d-inline-block align-text-top">
        @else
            <span class="fw-bold text-primary fs-2">{{ $setting->title ?? '' }}</span>
        @endif
    @endsection

    @section('footer')
        <div class="container">
            <div class="row justify-content-between pt-4 pb-3 pb-lg-5">
                <div class="col-12 col-lg-7">
                    @if ($setting && $setting->logo)
                        <a href="/">
                            <img alt="Free Frontend Logo" class="img-fluid mb-3" height="auto"
                                src="{{ Storage::url($setting->logo) }}" width="200">
                        </a>
                    @else
                        <p class="fw-bold text-primary fs-2">{{ $setting->title ?? '' }}</p>
                    @endif
                    <p class="mb-3">{{ $setting->description ?? '' }}</p>

                </div>
                <div class="col-12 col-lg-2 small text-lg-end mb-4 md-lg-0 pt-1">
                    <p class="mb-1 fw-bold">Developer</p>
                    <p class="mb-1">Imam Rofi'i</p>
                    <p class="mb-1">Adi Putra</p>
                </div>
                <div class="col-12 col-lg-3 pt-1 small text-lg-end">
                    <p class="mb-1 fw-bold">Sibanyu</p>
                    <p class="mb-1">Banyu Asin, Indonesia</p>
                    <p class="mb-1">Tel: {{ $setting->contact ?? '' }}</p>
                    <p class="mb-0">
                        <a class="text-dark text-decoration-none" href="https://wa.me/{{ $setting->whatsapp ?? '#' }}">Wa:
                            <span class="text-primary">
                                {{ $setting->whatsapp ?? '' }}
                            </span>
                        </a>
                    </p>
                </div>
            </div>
            <div class="border-top d-lg-none"></div>
            <div class="d-lg-flex justify-content-between py-3">
                <div class="small">
                    <span class="d-block d-lg-inline text-muted mb-2 mb-lg-0 me-lg-5">
                        © 2024
                        <a href="https://github.com/adptra01" target="_blank" rel="noopener noreferrer">adptra01</a></span>
                    <a class="d-block d-lg-inline text-muted mb-2 mb-lg-0 me-lg-5" href="#">Privacy Policy</a>
                    <a class="d-block d-lg-inline text-muted mb-2 mb-lg-0 me-lg-5" href="#">Terms of Service</a>
                </div>
                <div class="small">
                    <span class="text-muted"><a class="text-muted" href="">Proudly built with
                            Bootstrap</a></span>
                </div>
            </div>
        </div>
    @endsection
</div>
