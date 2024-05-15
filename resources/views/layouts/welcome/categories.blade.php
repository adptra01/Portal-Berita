@foreach ($this->categories as $category)
    <div class="tab-pane fade show {{ $loop->first ? 'show active' : '' }}" id="pills-{{ $category->slug }}"
        role="tabpanel" aria-labelledby="pills-{{ $category->slug }}-tab" tabindex="0">

        <div class="whats-news-caption">
            <div class="row">
                @foreach ($category->posts->take(4) as $item)
                    <div class="col-lg-6 col-md-6 mb-3">
                        <div class="single-what-news mb-100">
                            <div class="what-img">
                                <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}" loading="lazy"
                                    class="object-fit-cover" style="height: 250px;">
                            </div>
                            <div class="what-cap">
                                <span class="bg-primary text-white rounded">{{ $item->category->name }}</span>
                                <h4 class="text-break">
                                    <a
                                        href="{{ route('news.read', ['post' => $item->slug]) }}">{{ Str::limit($item->title, 70, ' ...') }}</a>
                                </h4>
                            </div>
                        </div>
                    </div>
                @endforeach
                @if ($category->posts->take(4)->count() < 4)
                    @for ($i = 0; $i < 4 - $category->posts->take(4)->count(); $i++)
                        <div class="col-lg-6 col-md-6 mb-3">
                            <div class="single-what-news mb-100 placeholder" style="width: 100%">
                                <div class="what-img">
                                    <img loading="lazy" class="object-fit-cover" style="height: 250px;">
                                </div>
                            </div>
                        </div>
                    @endfor
                @endif
            </div>
        </div>
    </div>
@endforeach
