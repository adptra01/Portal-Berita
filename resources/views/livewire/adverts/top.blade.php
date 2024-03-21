<?php

use function Livewire\Volt\{state, mount};
use Carbon\Carbon;
use App\Models\Advert;
use Illuminate\Support\Facades\Cache;

state(['topAdverts']);

mount(function () {
    $this->topAdverts = Advert::wherePosition('top')->where('end_date', '>=', today())->select('link', 'image', 'alt')->orderBy('updated_at')->get();
});
?>

<div>
    @if ($topAdverts)
        @section('top-adverts')
            @foreach ($topAdverts as $item)
                <a href="{{ $item->link }}" target="_blank" rel="noopener noreferrer">
                    <img src="{{ Storage::url($item->image) }}" class="mb-3 w-100 object-fit-cover rounded"
                        alt="{{ $item->alt }}" loading="lazy">
                </a>
            @endforeach
        @endsection
    @endif
</div>
