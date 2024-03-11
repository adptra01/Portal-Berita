<?php

use function Livewire\Volt\{state};
use Carbon\Carbon;
use App\Models\Advert;

state([
    'topAdverts' => fn() => Advert::whereStatus(true)->wherePosition('top')->orderBy('updated_at')->get(),
]);

?>

<div>
    @if ($topAdverts)
        @section('top-adverts')
            @foreach ($topAdverts as $item)
                <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ Storage::url($item->image) }}" class="mb-3 w-100 object-fit-cover" alt="{{ $item->alt }}"
                        loading="lazy">
                </a>
            @endforeach
        @endsection
    @endif
</div>
