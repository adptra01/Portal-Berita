<?php

use function Livewire\Volt\{state, rules};
use function Laravel\Folio\name;
use App\Models\Category;

name('posts.create');

state([
    'categories' => fn() => Category::select('id', 'name')->get(),
]);

?>
<x-admin-layout>
    <x-seo-tags :title="'Buat Berita Baru - Admin Panel'" />
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
                    <li class="breadcrumb-item active">Buat Berita</li>
                </ol>
            </nav>
            <div class="card">
                <form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="mb-3">
                            <label for="" class="form-label">Judul Berita
                                <span class="text-danger">*</span>
                            </label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                value="{{ old('title') }}" name="title" id=""
                                placeholder="Masukkan Judul Berita" />
                            @error('title')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>


                        <div class="row">
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="thumbnail" class="form-label">Gambar
                                        / Thumbnail
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="file"
                                        class="form-control @error('thumbnail')
                                is-invalid
                                @enderror"
                                        name="thumbnail" id="thumbnail" placeholder="Masukkan Gambar Thumbnail Berita"
                                        accept="image/*" required />
                                    @error('thumbnail')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="alt" class="form-label">Deskripi Gambar
                                        / alt
                                        <span class="text-danger">*</span>
                                    </label>
                                    <input type="text"
                                        class="form-control @error('alt')
                                is-invalid
                                @enderror"
                                        name="alt" id="alt" placeholder="Masukkan deskripsi / alt Berita"
                                        required />
                                    @error('alt')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>


                        <div class="mb-3">
                            <label for="keyword" class="form-label">Keyword
                                <span class="text-danger">*</span>
                            </label>
                            <input id="input-tags" name="keyword[]" autocomplete="off" placeholder="Kata kunci berita?">

                            @error('keyword')
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
                                        <option {{ old('category_id') == $category->id ? 'selected' : '' }}
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
                                    <option value="1">Terbit</option>
                                    <option value="0">Tidak Terbit</option>
                                </select>
                                @error('status')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <div class="alert alert-primary d-flex" role="alert">
                                <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
                                        class="bx bx-command fs-6"></i></span>
                                <div class="d-flex flex-column ps-1">
                                    <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Tips!</h6>
                                    <span>Kamu dapat menggunakan kombinasi tombol CTRL + Shift + V untuk "paste" teks tanpa
                                        mempertahankan format dari sumber aslinya. Hal ini berguna untuk menghindari masalah
                                        format yang tidak diinginkan ketika kamu menyalin dan menempel teks dari sumber yang
                                        berbeda.

                                    </span>
                                </div>
                            </div>
                            <label for="content" class="form-label">Isi Berita
                                <span class="text-danger">*</span>

                            </label>
                            <textarea id="editor" class="form-control" name="content" id="content" rows="3">
                            {{ old('content') }}
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
                    </div>
                </form>
            </div>
        </div>
    @endvolt
</x-admin-layout>
