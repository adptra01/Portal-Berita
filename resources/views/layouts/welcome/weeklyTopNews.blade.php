@foreach ($this->weeklyTopNews as $no => $item)
    <div class="weekly-single">
        <div class="weekly-img">
            <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}" loading="lazy"
                class="object-fit-cover" style="height: 250px;">
        </div>
        <div class="weekly-caption">
            <span class="bg-primary text-white rounded">{{ $item->category->name }}</span>
            <h4 class="text-break">
                <a
                    href="{{ route('news.read', ['post' => $item->slug]) }}">{{ Str::limit($item->title, 70, ' ...') }}</a>
            </h4>
        </div>
    </div>
@endforeach
@if ($this->weeklyTopNews->count() < 5)
    @for ($i = 0; $i < 5 - $this->weeklyTopNews->count(); $i++)
        <div class="weekly-single">
            <div class="weekly-img">
                <img loading="lazy" class="object-fit-cover rounded placeholder" style="height: 250px;">
            </div>
        </div>
    @endfor
@endif
