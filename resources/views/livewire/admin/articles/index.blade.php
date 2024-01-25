<?php

use function Livewire\Volt\{state, computed, usesPagination, rules};
use App\Models\Article;

usesPagination(theme: 'bootstrap');

state(['search'])->url();
state(['articleId']);

$articles = computed(function () {
    return Article::where('title', 'like', '%' . $this->search . '%')
        ->select('id', 'title', 'category_id', 'user_id')
        ->paginate(10);
});

$destroy = function (Article $article) {
    $article->delete();
};

?>

<div>
    <div class="card">
        <div class="card-header justify-content-between row">
            <div class="col-md">
                <a class="btn btn-primary" href="{{ route('articles.create') }}" role="button">Buat Berita Baru</a>
            </div>
            <div class="col-md">
                <div class="mb-3">
                    <input type="search" class="form-control" wire:model.live="search"
                        placeholder="Cari Judul Berita..." />
                </div>
                <span wire:loading>
                    <i class="bx bx-loader bx-spin"></i>
                    Loading...
                </span>
            </div>
        </div>
        <div class="card-body">
            <div class="table-responsive border rounded">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Judul Berita</th>
                            <th>Kategori</th>
                            <th>Penulis</th>
                            <th class="text-center">#</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($this->articles as $no => $article)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $article->title }}</td>
                                <td>
                                    <small
                                        class="badge bg-label-secondary text-wrap lh-lg">{{ $article->category->name }}</small>
                                </td>
                                <td>
                                    <span class="text-nowrap">{{ $article->user->name }}</span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-around gap-2">
                                        <button type="button" class="btn btn-warning btn-sm">
                                            Ubah
                                        </button>
                                        <button type="button" class="btn btn-danger btn-sm"
                                            wire:click='destroy({{ $article->id }})'
                                            wire:confirm.prompt="Yakin Ingin Menghapus?\n\nTulis 'hapus' untuk konfirmasi!|hapus">
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
                    {{ $this->articles->links() }}
                </div>
                <div class="col-md text-end">
                    <p>Menampilkan {{ $this->articles->count() }} hasil</p>
                </div>
            </div>
        </div>
    </div>
</div>
