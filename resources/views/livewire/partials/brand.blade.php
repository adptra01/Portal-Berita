<?php

use function Livewire\Volt\{state, mount};
use App\Models\Setting;
use Illuminate\Support\Facades\Cookie;

state(['logo', 'title', 'description']);

mount(function () {
    // Get data from database
    $setting = Setting::first();

    // Set data from database to variables
    $this->logo = $setting->logo;
    $this->title = $setting->title;
    $this->description = $setting->description;

    // Check if cookie exists
    $logoCookie = Cookie::get('logo');
    $titleCookie = Cookie::get('title');
    $descriptionCookie = Cookie::get('description');

    // Check if cookie values match the database values
    if ($logoCookie !== $this->logo || $titleCookie !== $this->title || $descriptionCookie !== $this->description) {
        // Update cookies if values are changed
        Cookie::queue('logo', $this->logo, 1440); // Cookie expires in 1 day (1440 minutes)
        Cookie::queue('title', $this->title, 1440); // Cookie expires in 1 day (1440 minutes)
        Cookie::queue('description', $this->description, 1440); // Cookie expires in 1 day (1440 minutes)
    }
    // Check if cookies have expired and delete them if necessary
    if (Cookie::has('logo') && !Cookie::get('logo')) {
        Cookie::queue(Cookie::forget('logo'));
    }
    if (Cookie::has('title') && !Cookie::get('title')) {
        Cookie::queue(Cookie::forget('title'));
    }
    if (Cookie::has('description') && !Cookie::get('description')) {
        Cookie::queue(Cookie::forget('description'));
    }
});

?>

<div>
    @section('header')
        @if ($logo)
            <img src="{{ Storage::url($logo) }}" alt="Logo" width="30" height="24"
                class="d-inline-block align-text-top">
        @else
            <span class="fw-bold text-primary fs-2">{{ $title ?? '' }}</span>
        @endif
    @endsection

    @section('footer')
        <h3 class="fw-bold text-primary fs-2"> {{ $title ?? '' }}</h3>
        <p class="small text-muted mb-3">
            {{ $description ?? '' }}
        </p>
    @endsection
</div>
