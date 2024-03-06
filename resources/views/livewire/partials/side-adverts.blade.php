<?php

use function Livewire\Volt\{state};
use Carbon\Carbon;
use App\Models\Advert;

state([
    'sideAdverts' => fn() => Advert::whereStatus(true)->wherePosition('side')->get(),
]);

?>

<div>
    @if ($sideAdverts)
        <div class="d-block">
            @foreach ($sideAdverts as $item)
                <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ Storage::url($item->image) }}" class="mb-3 w-100 object-fit-cover"
                        alt="{{ $item->alt }}" loading="lazy">
                </a>
            @endforeach
        </div>
    @endif
</div>
