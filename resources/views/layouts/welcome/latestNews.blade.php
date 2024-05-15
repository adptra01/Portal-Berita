@foreach ($this->latestNews as $item)
    <div class="weekly2-single">
        <div class="weekly2-img">
            <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}" loading="lazy"
                class="object-fit-cover" style="height: 200px;">
        </div>
        <div class="weekly2-caption">
            <span class="bg-primary text-white rounded">{{ $item->category->name }}</span>
            <p>{{ $item->created_at->format('d M Y') }}</p>
            <h4 class="text-break">
                <a
                    href="{{ route('news.read', ['post' => $item->slug]) }}">{{ Str::limit($item->title, 70, ' ...') }}</a>
            </h4>
        </div>
    </div>
@endforeach
@if ($this->latestNews->count() < 5)
    @for ($i = 0; $i < 5 - $this->latestNews->count(); $i++)
        <div class="weekly2-single rounded" style="width: 100%;">
            <div class="weekly2-img">
                <img loading="lazy" class="object-fit-cover rounded placeholder" style="height: 200px; width: 100%;">
            </div>
            <h4 class="text-break rounded placeholder my-3" style="width: 100%;"></h4>
            <h4 class="text-break rounded placeholder" style="width: 100%;"></h4>
        </div>
    @endfor
@endif

