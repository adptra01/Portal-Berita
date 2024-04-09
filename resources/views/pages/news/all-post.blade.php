<?php

use function Livewire\Volt\{state, computed};
use function Laravel\Folio\name;
use App\Models\Post;
use App\Models\Category;

name('news.all-post');

state(['search', 'category', 'start_date', 'end_date'])->url();
state(['categories' => fn() => Category::select('id', 'name')->get()]);

$posts = computed(function () {
    $query = Post::with('category')->where('status', true);

    // Filter berdasarkan judul jika ada pencarian
    if ($this->search) {
        $query->where('title', 'like', '%' . $this->search . '%');
    }

    // Filter berdasarkan kategori jika ada kategori yang dipilih
    if ($this->category) {
        $category = Category::where('name', $this->category)->first();
        if ($category) {
            $query->where('category_id', $category->id);
        }
    }

    // Filter berdasarkan tanggal mulai jika ada
    if ($this->start_date) {
        $query->whereDate('created_at', '>=', $this->start_date);
    }

    // Filter berdasarkan tanggal akhir jika ada
    if ($this->end_date) {
        $query->whereDate('created_at', '<=', $this->end_date);
    }

    // Ambil data post sesuai dengan query yang telah dibuat
    return $query->select('slug', 'title', 'thumbnail', 'category_id', 'created_at')->get();
});

?>

<x-guest-layout>
    <x-seo-tags :title="'Cari Berita - sibanyu Portal Berita Terkini'" :description="'Temukan berita terbaru dan terkini dari berbagai kategori di sibanyu Portal Berita Terkini.'" :keywords="'cari berita, berita terbaru, berita terkini, Sibanyu, kategori, tanggal, informasi'" />

    @livewire('adverts.top')

    @volt
        <div class="trending-area fix">
            <div class="container py-3">
                <div class="mb-4">
                    <label for="search" class="form-label">Cari Berita</label>
                    <input type="search" class="form-control form-control-lg" wire:model.live="search"
                        aria-describedby="search" placeholder="Input pencarian berita..." />
                </div>
                <div class="row justify-content-between">
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
                            <label for="start_date" class="form-label">Tanggal Mulai</label>
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
                <p class="text-center">
                    <i wire:loading class='bx bx-loader bx-spin bx-sm'></i>
                </p>
            </div>

            <div class="container trending-main">
                <div class="row gy-4 mb-4 trending-bottom">
                    @foreach ($this->posts as $item)
                        <div class="col-sm-6 col-lg-4 mb-5">
                            <div class="single-bottom mb-35">
                                <div class="trend-bottom-img mb-30">
                                    <img src="{{ Storage::url($item->thumbnail) }}" alt="{{ $item->title }}" loading="lazy"
                                        class="object-fit-cover" height="250px">
                                </div>
                                <div class="trend-bottom-cap">
                                    <span
                                        class="bg-primary text-white rounded text-uppercase">{{ $item->category->name }}</span>
                                    <h4 class="text-break">
                                        <a href="{{ route('news.read', ['post' => $item->slug]) }}">{{ $item->title }}</a>
                                    </h4>
                                    <p>{{ $item->created_at->format('d M Y') }}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            @livewire('adverts.bottom')

        </div>
    @endvolt

</x-guest-layout>
