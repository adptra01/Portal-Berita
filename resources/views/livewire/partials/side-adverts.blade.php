<?php

use function Livewire\Volt\{state, computed};
use Carbon\Carbon;
use App\Models\Advert;

state(['countAdverts', 'takeAdverts' => fn() => $this->countAdverts ?? 5]);

$sideAdverts = computed(function () {
    return Advert::whereStatus(true)->wherePosition('side')->orderBy('updated_at')->get();
});

?>

<div>
    @if ($this->sideAdverts)
        <div class="d-block">
            @foreach ($this->sideAdverts->take($this->takeAdverts) as $item)
                <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ Storage::url($item->image) }}" class="mb-3 w-100 object-fit-cover"
                        alt="{{ $item->alt }}" loading="lazy">
                </a>
            @endforeach
        </div>

        @if ($this->sideAdverts->count() > $this->takeAdverts)
            <div class="container">
                @section('down-adverts')
                    <div class="d-block">
                        @foreach ($this->sideAdverts->skip($this->takeAdverts) as $item)
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
