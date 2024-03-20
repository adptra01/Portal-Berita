<?php

use function Livewire\Volt\{state, mount};
use Carbon\Carbon;
use App\Models\Advert;

state([
    'sideAdverts'
]);

mount(function () {
    $cacheKey = 'sideAdverts_' . Str::random(20);
    $this->sideAdverts = Cache::remember($cacheKey, now()->addMinutes(30), function () {
        return Advert::wherePosition('side')->where('end_date', '>=', today())->latest()->get();
    });
});

?>

<div>
    @if ($sideAdverts)
        <div class="container d-block">
            @foreach ($sideAdverts as $item)
                <img src="{{ Storage::url($item->image) }}" class="mb-3 w-100 object-fit-cover" alt="{{ $item->alt }}"
                    loading="lazy">
            @endforeach
        </div>
    @endif
</div>
