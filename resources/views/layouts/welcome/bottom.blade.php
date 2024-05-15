<div class="trending-bottom">
    <div class="row">
        @forelse ($this->trending->skip(1)->take(3) as $item)
            <div class="col-lg-4">
                <div class="single-bottom mb-35">
                    <div class="trend-bottom-img mb-30">
                        <img src="{{ Storage::url($item->thumbnail) }}" loading="lazy" alt="{{ $item->title }}"
                            class="object-fit-cover" style="height: 160px;">
                    </div>
                    <div class="trend-bottom-cap">
                        <span class="bg-primary text-white rounded">{{ $item->category->name }}</span>
                        <h4 class="text-break">
                            <a
                                href="{{ route('news.read', ['post' => $item->slug]) }}">{{ Str::limit($item->title, 70, ' ...') }}</a>
                        </h4>
                    </div>
                </div>
            </div>

        @empty
            @for ($i = 0; $i < 3; $i++)
                <div class="col-lg-4">
                    <div class="single-bottom mb-35 bg-body rounded placeholder" style="width: 100%;">
                        <div class="trend-bottom-img mb-30" style="width: 100%;">
                            <img loading="lazy" alt="" class="object-fit-cover placeholder"
                                style="height: 160px;">
                        </div>
                        <div class="trend-bottom-cap">
                            <span class="bg-primary text-white rounded placeholder" style="width: 100%;"></span>
                            <h4 class="text-break placeholder" style="width: 100%;"></h4>
                        </div>
                    </div>
                </div>
            @endfor
        @endforelse
        @if ($this->trending->skip(1)->count() < 5)
            @for ($i = 0; $i < 4 - $this->trending->count(); $i++)
                <div class="col-lg-4">
                    <div class="single-bottom mb-35 bg-body rounded placeholder" style="width: 100%;">
                        <div class="trend-bottom-img mb-30" style="width: 100%;">
                            <img loading="lazy" alt="" class="object-fit-cover placeholder"
                                style="height: 160px;">
                        </div>
                        <div class="trend-bottom-cap">
                            <span class="bg-primary text-white rounded placeholder" style="width: 100%;"></span>
                            <h4 class="text-break placeholder" style="width: 100%;">
                            </h4>
                        </div>
                    </div>
                </div>
            @endfor
        @endif
    </div>
</div>
