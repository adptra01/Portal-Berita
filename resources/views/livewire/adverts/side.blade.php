<?php

use function Livewire\Volt\{state, mount};
use Carbon\Carbon;
use App\Models\Advert;
use Illuminate\Support\Facades\Cache;

state(['countAdverts', 'takeAdverts' => fn() => $this->countAdverts ?? 5, 'sideAdverts']);

mount(function () {
    $cacheKey = 'sideAdverts_' . Str::random(20);
    $this->sideAdverts = Cache::remember($cacheKey, now()->addMinutes(30), function () {
        return Advert::wherePosition('side')->where('end_date', '>=', today())->latest()->get();
    });
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
