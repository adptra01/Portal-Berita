<?php

use function Livewire\Volt\{state};
use Carbon\Carbon;
use App\Models\Advert;

state([
    'topAdverts' => fn() => Advert::whereStatus(true)->wherePosition('top')->get(),
]);

?>

<div>
    @if ($topAdverts)
        @section('top-adverts')
            @foreach ($topAdverts as $item)
                <img src="{{ Storage::url($item->image) }}" class="mb-3 w-100 object-fit-cover" alt="{{ $item->alt }}"
                    loading="lazy">
            @endforeach
        @endsection
    @endif
</div>
