<?php

use function Livewire\Volt\{computed, state, mount};
use function Laravel\Folio\name;
use App\Models\Post;
use App\Models\Category;

name('news.search-result');

state(['keywords', 'category', 'start_date', 'end_date'])->url();
state(['categories' => fn() => Category::select('id', 'name')->get()]);

$posts = computed(function () {
    return Post::with('category')
        ->filterBySearch($this->keywords)
        ->filterByCategory($this->category)
        ->filterByDateRange($this->start_date, $this->end_date)
        ->select('slug', 'title', 'thumbnail', 'content', 'category_id', 'created_at')
        ->get();
});

?>

<x-guest-layout>
    <x-seo-tags :title="'Cari Berita - sibanyu Portal Berita Terkini'" :description="'Temukan berita terbaru dan terkini dari berbagai kategori di sibanyu Portal Berita Terkini.'" :keywords="'cari berita, berita terbaru, berita terkini, Sibanyu, kategori, tanggal, informasi'" />
    @livewire('adverts.top')
    @livewire('adverts.popup')

    @volt
        <div>
            <div class="trending-area fix">
                <div class="container my-5">
                    <div class="row justify-content-between">
                        <h3 class="pb-3 text-center">
                            "{{ $this->keywords }}"
                        </h3>
                        <div class="col-md">
                            <div class="mb-4">
                                <label for="exampleDataList" class="form-label text-capitalize">Kategori
                                    {{ $category }}</label>
                                <input wire:model.live="category" class="form-control" list="datalistOptions"
                                    id="exampleDataList" placeholder="Pilih Kategori Berita...">
                                <datalist id="datalistOptions">
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->name }}">
                                    @endforeach
                                </datalist>
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-4">
                                <label for="start_date" class="form-label">Tanggal Awal</label>
                                <input type="date" class="form-control" wire:model.live="start_date" id="start_date"
                                    aria-describedby="helpId" />
                            </div>
                        </div>
                        <div class="col-md">
                            <div class="mb-4">
                                <label for="end_date" class="form-label">Tanggal Akhir</label>
                                <input type="date" class="form-control" wire:model.live="end_date" id="end_date"
                                    aria-describedby="helpId" />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="container trending-main">
                    <div class="row gy-4 mb-4 trending-bottom">
                        @foreach ($this->posts as $item)
                            <div class="col-sm-6 col-lg-4">
                                <div class="single-bottom mb-35">
                                    <div class="trend-bottom-img mb-30">
                                        <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}"
                                            loading="lazy" class="object-fit-cover" height="250px">
                                    </div>
                                    <div class="trend-bottom-cap">
                                        <span class="bg-primary text-white rounded">{{ $item->category->name }}</span>
                                        <h4 class="text-break">
                                            <a
                                                href="{{ route('news.read', ['post' => $item->slug]) }}">{{ $item->title }}</a>
                                        </h4>
                                        <p>{{ $item->created_at->format('d M Y') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="container">
                    @livewire('adverts.side')
                    @livewire('adverts.bottom')
                </div>
            </div>
        </div>
    @endvolt

</x-guest-layout>
