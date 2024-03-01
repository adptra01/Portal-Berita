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
    <x-slot name="title">{{ $post->title }}</x-slot>
    @include('layouts.editor')
    @include('layouts.bs-select')

    @volt
        <div>
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
                                <p>: <a href="{{ route('news.read', ['post' => $post->slug]) }}">{{ $post->title }}</a></p>
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
                                        class="badge bg-primary">{{ $post->status == true ? 'Terbit' : 'Tidak Terbit' }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Jumlah Dilihat</p>
                            <div class="col-md-10">
                                <p class="text-capitalize">: {{ $post->viewer ?? '0' }} Kali</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Thumbnail</p>
                            <div class="col-md-10">
                                : <a class="fw-bold text-sm" data-bs-toggle="collapse" href="#collapseThumbnail"
                                    role="button" aria-expanded="false" aria-controls="collapseThumbnail"> Lihat
                                    <i class='bx bxs-down-arrow bx-xs'></i></a>
                                <div class="collapse" id="collapseThumbnail">
                                    <div class="d-flex p-3">
                                        <img src="{{ Storage::url($post->thumbnail) }}" alt="collapse-image"
                                            class="me-4 mb-sm-0 mb-2 w-100">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Isi Berita</p>
                            <div class="col-md-10">
                                : <a class="fw-bold text-sm" data-bs-toggle="collapse" href="#collapseExample"
                                    role="button" aria-expanded="false" aria-controls="collapseExample">
                                    Lihat
                                    <i class='bx bxs-down-arrow bx-xs'></i></a>
                                <div class="collapse" id="collapseExample">
                                    <article class="blog_details fr-view mt-3">
                                        {!! $post->content !!}
                                    </article>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-edit" role="tabpanel">
                        <form action="{{ route('posts.update', $post->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="mb-3">
                                <label for="" class="form-label">Judul Berita
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control @error('title') is-invalid @enderror"
                                    value="{{ $post->title }}" name="title" id=""
                                    placeholder="Masukkan Judul Berita" />
                                @error('title')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <div class="alert alert-warning d-flex" role="alert">
                                    <span
                                        class="badge badge-center rounded-pill bg-warning border-label-warning p-3 me-2"><i
                                            class="bx bx-error bx-flashing-hover fs-6"></i>
                                    </span>
                                    <div class="d-flex flex-column ps-1">
                                        <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Peringatan!
                                        </h6>
                                        <span>Jangan mengunggah gambar yang sama kecuali ada perubahan yang ingin
                                            dilakukan pada
                                            gambar tersebut.</span>
                                    </div>
                                </div>
                                <label for="thumbnail" class="form-label">Gambar
                                    / Thumbnail
                                    <span class="text-danger">*</span>
                                </label>
                                <input type="file"
                                    class="form-control @error('thumbnail')
                            is-invalid
                            @enderror"
                                    name="thumbnail" id="thumbnail" placeholder="Masukkan Gambar Thumbnail Berita"
                                    accept="image/*" />
                                @error('thumbnail')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>


                            <div class="mb-3 row">
                                <div class="col-md">
                                    <label for="category_id" class="form-label">Kategori Berita
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select
                                        class="@error('category_id')
                                is-invalid
                                @enderror"
                                        name="category_id" id="category_id">
                                        <option selected disabled>Select one</option>
                                        @foreach ($categories as $category)
                                            <option {{ $post->category_id == $category->id ? 'selected' : '' }}
                                                value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="col-md">
                                    <label for="status" class="form-label">Status Publish
                                        <span class="text-danger">*</span>
                                    </label>
                                    <select
                                        class="@error('status')
                                is-invalid
                                @enderror"
                                        name="status" id="status">
                                        <option selected disabled>Select one</option>
                                        <option value="1" {{ $post->status == true ? 'selected' : '' }}>Terbit
                                        </option>
                                        <option value="0" {{ $post->status == false ? 'selected' : '' }}>Tidak
                                            Terbit
                                        </option>
                                    </select>
                                    @error('status')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="alert alert-primary d-flex" role="alert">
                                    <span
                                        class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
                                            class="bx bx-command fs-6"></i></span>
                                    <div class="d-flex flex-column ps-1">
                                        <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Tips!</h6>
                                        <span>Kamu dapat menggunakan kombinasi tombol CTRL + Shift + V untuk "paste"
                                            teks tanpa
                                            mempertahankan format dari sumber aslinya. Hal ini berguna untuk menghindari
                                            masalah
                                            format yang tidak diinginkan ketika kamu menyalin dan menempel teks dari
                                            sumber yang
                                            berbeda.

                                        </span>
                                    </div>
                                </div>
                                <label for="content" class="form-label">Isi Berita
                                    <span class="text-danger">*</span>
                                </label>
                                <textarea id="editor" class="form-control" name="content" id="content" rows="3">
                                {{ $post->content }}
                            </textarea>
                                @error('content')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="mb-3 text-end">
                                <button type="submit" class="btn btn-primary">
                                    Submit
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endvolt

</x-admin-layout>
