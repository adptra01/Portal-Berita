<?php

use function Livewire\Volt\{state, rules};
use function Laravel\Folio\name;
use App\Models\Category;
use App\Models\Post;

name('posts.edit');

$destroy = function (post $post) {
    Storage::delete($post->thumbnail);
    $post->delete();

    return redirect()->route('posts.index')->with('success', 'Proses Berhasil Dilakukan 😁!');
};

state(['post', 'categories' => fn() => Category::select('id', 'name')->get()]);

?>

<x-admin-layout>
    @include('layouts.editor')
    @include('layouts.bs-select')

    @volt
        <div>
            <x-seo-tags :title="$post->title" />

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Berita</a>
                    </li>
                    <li class="breadcrumb-item active">{{ $post->title }}</li>
                </ol>
            </nav>
            <div class="nav-align-top">
                <ul class="nav nav-pills mb-3 row" role="tablist">
                    <li class="nav-item col-md">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-preview" aria-controls="navs-pills-top-preview"
                            aria-selected="true">
                            <i class='bx bxs-dock-top'></i>
                            Keterangan
                        </button>
                    </li>
                    <li class="nav-item col-md">
                        <button type="button" class="nav-link" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-pills-top-edit" aria-controls="navs-pills-top-edit" aria-selected="false">
                            <i class='bx bx-edit'></i>
                            Edit Berita</button>
                    </li>
                    <li class="nav-item col-md">
                        <button class="nav-link" role="tab" data-bs-toggle="tab"
                            wire:click='destroy({{ $post->id }})'
                            wire:confirm.prompt="Yakin Ingin Menghapus?\n\nTulis 'hapus' untuk konfirmasi!|hapus"
                            wire:loading.attr="disabled">
                            <i class='bx bx-trash'></i>
                            Hapus Berita</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-top-preview" role="tabpanel">

                        <div class="mb-3">
                            <p class="col-md-3 fw-bold">Gambar / thumbnail</p>
                            <img src="{{ Storage::url($post->thumbnail) }}" alt="{{ $post->title }}"
                                class="w-100 border border-5 border-secondary rounded">
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">ID</p>
                            <div class="col-md-10">
                                <p>: {{ $post->id }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Slug</p>
                            <div class="col-md-10">
                                <p>: {{ $post->slug }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Judul Berita</p>
                            <div class="col-md-10">
                                <p>: <a href="{{ route('preview.read', ['post' => $post->slug]) }}">{{ $post->title }}</a></p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Kategori Berita</p>
                            <div class="col-md-10">
                                <p class="text-capitalize">: <span
                                        class="badge bg-primary">{{ $post->category->name }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Keyword Berita</p>
                            <div class="col-md-10">
                                <p class="text-capitalize">: {{ $post->keyword ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Penulis</p>
                            <div class="col-md-10">
                                <p class="text-capitalize">: {{ $post->user->name ?? '-' }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Status</p>
                            <div class="col-md-10">
                                <p class="text-capitalize">:
                                    <span
                                        class="badge bg-{{ $post->status == true ? 'primary' : 'danger' }}">{{ $post->status == true ? 'Terbit' : 'Tidak Terbit' }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Jumlah Dilihat</p>
                            <div class="col-md-10">
                                <p class="text-capitalize">: {{ $post->viewer ?? '0' }} Kali</p>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-edit" role="tabpanel">
                        @include('pages.admin.posts.edit')
                    </div>
                </div>
            </div>
        </div>
    @endvolt

</x-admin-layout>
