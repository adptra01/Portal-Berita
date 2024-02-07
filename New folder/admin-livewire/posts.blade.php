<?php

use function Livewire\Volt\{state, computed, usesPagination, rules};
use function Laravel\Folio\name;
use App\Models\Category;
use App\Models\Post;

usesPagination(theme: 'bootstrap');

state(['search', 'category_id', 'start_date', 'end_date'])->url();
state([
    'categories' => fn() => Category::select('id', 'name')->get(),
]);

$destroy = function (post $post) {
    Storage::delete($post->thumbnail);
    $post->delete();
};

$posts = computed(function () {
    $query = Post::with('category');

    // Filter berdasarkan judul jika ada pencarian
    if ($this->search) {
        $query->where('title', 'like', '%' . $this->search . '%');
    }

    // Filter berdasarkan kategori jika ada kategori yang dipilih
    if ($this->category_id) {
        $category = Category::where('id', $this->category_id);
        if ($category->exists()) {
            $query->where('category_id', $this->category_id);
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
    return $query->paginate(10);
});

?>

<div>
    <div class="card">
        <a class="btn btn-primary card-header" href="{{ route('posts.create') }}" role="button">Buat Berita Baru</a>

        <div class="card-header justify-content-between">
            <div class="row">
                <div class="col-md">
                    <div class="mb-4">
                        <label for="category_id" class="form-label">Kategori {{ $this->category_id }}</label>
                        <select class="form-select" wire:model.live="category_id" id="category_id">
                            <option selected value=" ">Pilih Kategori</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md">
                    <div class="mb-4">
                        <label for="search" class="form-label">Cari Berita</label>
                        <input type="search" class="form-control" wire:model.live="search" aria-describedby="search"
                            placeholder="Input pencarian berita..." />
                    </div>
                </div>
            </div>
            <div class="row">
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
        </div>
        <div class="card-body">
            <div class="table-responsive border rounded">
                <table class="table table-hover text-center" style="font-size: 13px">
                    <thead>
                        <tr>
                            <th>Redaktur</th>
                            <th>Judul Berita</th>
                            <th>Dilihat</th>
                            <th>Tanggal Buat</th>
                            <th>#</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($this->posts as $post)
                            <tr>
                                <td>
                                    {{ $post->user->name }}
                                </td>
                                <td>
                                    {{ $post->title }}
                                </td>
                                <td>
                                    {{ $post->viewer }}
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($post->created_at)->format('d M Y') }}
                                </td>
                                <td>
                                    <div class="d-flex justify-content-around gap-2">
                                        <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">
                                            Ubah
                                        </a>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            wire:click='destroy({{ $post->id }})'
                                            wire:confirm.prompt="Yakin Ingin Menghapus?\n\nTulis 'hapus' untuk konfirmasi!|hapus"
                                            wire:loading.attr="disabled">
                                            Hapus
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="my-4 row align-items-center">
                <div class="col-md">
                    {{ $this->posts->links() }}
                </div>
                <div class="col-md text-end">
                    <p>Menampilkan {{ $this->posts->count() }} hasil</p>
                </div>
            </div>
        </div>
    </div>
</div>
