<?php

use function Livewire\Volt\{state};
use Carbon\Carbon;
use App\Models\Advert;

state([
    'bottomAdverts' => fn () =>  Advert::wherePosition('bottom')->where('end_date', '>=', today())->select('link', 'image', 'alt')->orderBy('updated_at')->get(),
]);

?>

<div>
    @if ($bottomAdverts)
        <div class="container d-block">
            @foreach ($bottomAdverts as $item)
                <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ Storage::url($item->image) }}" class="mb-3 w-100 object-fit-cover rounded"
                        alt="{{ $item->alt }}" loading="lazy">
                </a>>
            @endforeach
        </div>
    @endif
</div>
