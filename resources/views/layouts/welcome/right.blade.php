@forelse ($this->trending->skip(4)->take(4) as $item)
    <div class="trand-right-single d-flex">
        <div class="trand-right-img">
            <img src="{{ Storage::url($item->thumbnail) }}" class="object-fit-cover" style="min-height: 95px; width: 150px"
                loading="lazy" alt="{{ $item->title }}">
        </div>
        <div class="trand-right-cap">
            <span class="bg-primary text-white rounded">{{ $item->category->name }}</span>
            <h4 class="text-break">
                <a
                    href="{{ route('news.read', ['post' => $item->slug]) }}">{{ Str::limit($item->title, 70, ' ...') }}</a>
            </h4>
        </div>
    </div>
@empty
    @for ($i = 0; $i < 5; $i++)
        <div class="trand-right-single d-flex">
            <div class="trand-right-img">
                <img class="object-fit-cover placeholder" style="height: 120px; width: 150px">
            </div>
            <div class="trand-right-cap" style="width: 100%;">
                <span class="bg-primary text-white rounded placeholder" style="width: 100%;"></span>
                <h4 class="text-break rounded placeholder" style="width: 100%;">
                </h4>
            </div>
        </div>
    @endfor
@endforelse
@if ($this->trending->skip(4)->count() < $this->trending->skip(4)->count() + 1 && $this->trending->skip(4)->count() !== 0)
    @for ($i = 0; $i < 5 - $this->trending->skip(4)->count(); $i++)
        <div class="trand-right-single d-flex">
            <div class="trand-right-img">
                <img class="object-fit-cover placeholder" style="height: 120px; width: 150px">
            </div>
            <div class="trand-right-cap" style="width: 100%;">
                <span class="bg-primary text-white rounded placeholder" style="width: 100%;"></span>
                <h4 class="text-break rounded placeholder" style="width: 100%;">
                </h4>
            </div>
        </div>
    @endfor
@endif
