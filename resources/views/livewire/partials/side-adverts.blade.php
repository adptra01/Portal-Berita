<?php

use function Livewire\Volt\{state};
use Carbon\Carbon;
use App\Models\Advert;

state([
    'sideAdverts' => fn() => Advert::whereStatus(true)->wherePosition('side')->latest()->get(),
]);

?>

<div>
    @if ($sideAdverts)
        <div class="d-block">
            @foreach ($sideAdverts->take(5) as $item)
                <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ Storage::url($item->image) }}" class="mb-3 w-100 object-fit-cover"
                        alt="{{ $item->alt }}" loading="lazy">
                </a>
            @endforeach
        </div>

        @if ($sideAdverts->count() > 5)
            <div class="container">
                @section('down-adverts')
                    <div class="d-block">
                        @foreach ($sideAdverts->skip(5) as $item)
                            <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ Storage::url($item->image) }}" class="mb-3 w-100 object-fit-cover"
                                    alt="{{ $item->alt }}" loading="lazy">
                            </a>
                        @endforeach
                    </div>
                @endsection
            </div>
        @endif
    @endif
</div>
