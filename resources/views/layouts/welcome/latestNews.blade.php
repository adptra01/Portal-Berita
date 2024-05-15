@if ($this->latestNews)
    @forelse ($this->latestNews as $item)
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
    @empty
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
    @endforelse

@endif
