<?php

use function Livewire\Volt\{state, computed};
use function Laravel\Folio\name;
use App\Models\Post;
use App\Models\Category;

name('news.search-post');

state(['search', 'category', 'start_date', 'end_date'])->url();
state(['categories' => fn() => Category::select('id', 'name')->get()]);

$posts = computed(function () {
    return Post::with('category')
        ->filterBySearch($this->search)
        ->filterByCategory($this->category)
        ->filterByDateRange($this->start_date, $this->end_date)
        ->select('slug', 'title', 'thumbnail', 'content', 'category_id', 'created_at')
        ->get();
});

?>

<x-guest-layout>
    <x-seo-tags :title="'Cari Berita - sibanyu Portal Berita Terkini'" :description="'Temukan berita terbaru dan terkini dari berbagai kategori di sibanyu Portal Berita Terkini.'" :keywords="'cari berita, berita terbaru, berita terkini, Sibanyu, kategori, tanggal, informasi'" />

    @livewire('adverts.top')

    @volt
        <div class="trending-area fix">
            <section class="blog_area section-padding pt-5">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="blog_right_sidebar">
                                <div class="py-3">
                                    <div class="mb-4">
                                        <label for="search" class="form-label">Judul Berita</label>
                                        <input type="search" class="form-control" wire:model.live="search"
                                            aria-describedby="search" placeholder="Input pencarian berita..." />
                                    </div>
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
                                    <div class="mb-4">
                                        <label for="start_date" class="form-label">Tanggal Mulai</label>
                                        <input type="date" class="form-control" wire:model.live="start_date"
                                            id="start_date" aria-describedby="helpId" />
                                    </div>
                                    <div class="mb-4">
                                        <label for="end_date" class="form-label">Tanggal Akhir</label>
                                        <input type="date" class="form-control" wire:model.live="end_date" id="end_date"
                                            aria-describedby="helpId" />
                                    </div>
                                    <p class="text-center">
                                        <i wire:loading class='bx bx-loader bx-spin bx-sm'></i>
                                    </p>
                                </div>
                                <aside class="single_sidebar_widget popular_post_widget rounded bg-body">
                                    <!-- New Poster -->
                                    @livewire('adverts.side')
                                </aside>

                            </div>
                        </div>
                        <div class="col-lg-8 mb-5 mb-lg-0">
                            <div class="blog_left_sidebar">

                                <div class="list-group">

                                    @foreach ($this->posts as $item)
                                        <a href="#" class="list-group-item list-group-item-action border-0 mb-3">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">{{ $item->title }}</h5>
                                            </div>
                                            <p class="">{!! Str::limit($item->content, 250, '...') !!}</p>
                                            <small
                                                class="text-body-secondary">{{ $item->created_at->format('d M Y') }}</small>
                                        </a>
                                    @endforeach

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            @livewire('adverts.bottom')

        </div>
    @endvolt

</x-guest-layout>
