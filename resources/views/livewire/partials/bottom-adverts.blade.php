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
        <div class="container d-block">
            @foreach ($sideAdverts as $item)
                <img src="{{ Storage::url($item->image) }}" class="mb-3 w-100 object-fit-cover" alt="{{ $item->alt }}"
                    loading="lazy">
            @endforeach
        </div>
    @endif
</div>
