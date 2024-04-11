<?php

use function Livewire\Volt\{state, mount};
use Carbon\Carbon;
use App\Models\Advert;

state(['sideAdverts']);

mount(function () {
    $this->sideAdverts = Cache::remember('sideAdverts', now()->addMinutes(10), function () {
        return Advert::wherePosition('side')->where('end_date', '>=', today())->select('link', 'image', 'alt')->orderBy('updated_at')->get();
    });
});
?>

<div>
    @if ($sideAdverts)
        <div class="d-block">
            @foreach ($sideAdverts as $item)
                <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ Storage::url($item->image) }}" class="mb-3 w-100 object-fit-cover rounded"
                        alt="{{ $item->alt }}" loading="lazy">
                </a>
            @endforeach
        </div>

    @endif
</div>
