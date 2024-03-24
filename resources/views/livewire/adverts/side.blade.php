<?php

use function Livewire\Volt\{state, mount};
use Carbon\Carbon;
use App\Models\Advert;

state(['countAdverts', 'takeAdverts' => fn() => $this->countAdverts ?? 5, 'sideAdverts']);

mount(function () {
    $this->sideAdverts = Advert::wherePosition('side')
        ->where('end_date', '>=', today())
        ->select('link', 'image', 'alt')
        ->orderBy('updated_at')
        ->get($this->takeAdverts);
});
?>

<div>
    @if ($sideAdverts)
        <div class="d-block">
            @foreach ($sideAdverts->take($this->takeAdverts) as $item)
                <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ Storage::url($item->image) }}" class="mb-3 w-100 object-fit-cover rounded"
                        alt="{{ $item->alt }}" loading="lazy">
                </a>
            @endforeach
        </div>

        @if ($sideAdverts->count() > $this->takeAdverts)
            <div class="container">
                @section('down-adverts')
                    <div class="d-block">
                        @foreach ($sideAdverts->skip($this->takeAdverts) as $item)
                            <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">
                                <img src="{{ Storage::url($item->image) }}" class="mb-3 w-100 object-fit-cover rounded"
                                    alt="{{ $item->alt }}" loading="lazy">
                            </a>
                        @endforeach
                    </div>
                @endsection
            </div>
        @endif
    @endif
</div>
