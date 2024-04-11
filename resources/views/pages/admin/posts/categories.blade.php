<?php

use function Livewire\Volt\{state, computed, usesPagination, rules};
use function Laravel\Folio\name;
use App\Models\Category;

usesPagination(theme: 'bootstrap');
name('posts.categories');

state(['search'])->url();
state(['name', 'slug', 'categoryId']);

rules(['name' => 'required|min:3|string']);

$categories = computed(function () {
    return category::where('name', 'like', '%' . $this->search . '%')
        ->latest()
        ->paginate(10);
});

$save = function (Category $category) {
    $validate = $this->validate();

    if ($this->categoryId == null) {
        $validate['slug'] = Str::slug($this->name);
        $category->create($validate);
    } else {
        $categoryUpdate = Category::find($this->categoryId);
        $validate['slug'] = Str::slug($this->name);
        $categoryUpdate->update($validate);
    }
    $this->reset('name', 'slug', 'categoryId');
};

$edit = function (Category $category) {
    $category = Category::find($category->id);
    $this->categoryId = $category->id;
    $this->name = $category->name;
};

$deleted = function (Category $category) {
    $category->delete();
    $this->reset('name', 'slug', 'categoryId');
};

$resetAll = function () {
    $this->reset('name', 'slug', 'categoryId');
};

?>




<x-admin-layout>
    <x-seo-tags :title="'Kategori Berita - Admin Panel'" />
    @volt
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Kategori Berita</li>
                </ol>
            </nav>
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <label for="html5-text-input" class="col-md-2 col-form-label">Form Kategori</label>
                        <div class="col-md-10">
                            <form wire:submit="save">
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    wire:model="name" placeholder="Tambah/Ubah Kategori" />
                                @error('name')
                                    <small class="text-danger">{{ $message }}</small>
                                @enderror
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                    <button wire:click='resetAll' type="button" class="btn btn-danger">
                                        Reset
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <input type="search" class="form-control" wire:model.live="search" placeholder="Cari Kategori" />
                </div>
                <div class="card-body">
                    <div class="table-responsive rounded">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Kategori</th>
                                    <th>Slug/URL</th>
                                    <th>Total Artikel</th>
                                    <th class="text-center">#</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($this->categories as $no => $category)
                                    <tr>
                                        <td>{{ ++$no }}.</td>
                                        <td>{{ $category->name }}</td>
                                        <td>{{ $category->slug }}</td>
                                        <td>{{ $category->posts->count() }} Artikel</td>
                                        <td>
                                            <div class="d-flex justify-content-around gap-2">
                                                <button type="button" class="btn btn-warning btn-sm"
                                                    wire:click='edit({{ $category->id }})'>
                                                    Ubah
                                                </button>
                                                <button type="button" class="btn btn-danger btn-sm"
                                                    wire:click='deleted({{ $category->id }})'
                                                    wire:confirm.prompt="Yakin ingin menghapus kategori {{ $category->name }}, hal ini akan berakibat pada penghapusan semua berita dengan kategori {{ $category->name }} ?\n\nTulis 'hapus' untuk konfirmasi!|hapus">
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
                            {{ $this->categories->links() }}
                        </div>
                        <div class="col-md text-end">
                            <p>Menampilkan {{ $this->categories->count() }} hasil</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endvolt
</x-admin-layout>
