<?php

use function Livewire\Volt\{state, computed, usesPagination, rules};
use App\Models\Post;

usesPagination(theme: 'bootstrap');

state(['search'])->url();
state(['postId']);

$posts = computed(function () {
    return Post::where('title', 'like', '%' . $this->search . '%')
        ->select('id', 'title', 'thumbnail', 'user_id')
        ->latest()
        ->paginate(10);
});

$destroy = function (post $post) {
    Storage::delete($post->thumbnail);
    $post->delete();
};

?>

<div>
    <div class="card">
        <div class="card-header justify-content-between row">
            <div class="col-md">
                <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">Buat Berita Baru</a>
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
                            <th>Thumbnail</th>
                            <th>Judul Berita</th>
                            <th>Penulis</th>
                            <th class="text-center">#</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($this->posts as $no => $post)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>
                                    <img src="{{ Storage::url($post->thumbnail) }}" class="rounded w-px-50 h-auto"
                                        alt="{{ $post->title }}" />
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>
                                    <span class="text-nowrap">{{ $post->user->name }}</span>
                                </td>
                                <td>
                                    <div class="d-flex justify-content-around gap-2">
                                        <button type="button" class="btn btn-warning btn-sm">
                                            Ubah
                                        </button>
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
