<?php

use function Livewire\Volt\{state, mount};
use Carbon\Carbon;
use App\Models\Advert;
use Illuminate\Support\Facades\Cache;

state(['bottomAdverts']);

mount(function () {
    $this->bottomAdverts = Cache::remember('bottomAdverts', now()->addMinutes(10), function () {
        return Advert::wherePosition('bottom')->where('end_date', '>=', today())->select('link', 'image', 'alt')->orderBy('updated_at')->get();
    });
});

?>

<div>
    @if ($bottomAdverts)
        <div class="container d-block my-3">
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($bottomAdverts as $key => $item)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img src="{{ Storage::url($item->image) }}" class="w-100" loading="lazy"
                                alt="{{ $item->alt ?? $item->name }}">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Sebelumnya</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Selanjutnya</span>
                </button>
            </div>
        </div>
    @endif
</div>
