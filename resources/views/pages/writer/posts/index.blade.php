<?php

use function Livewire\Volt\{state, computed, usesPagination, rules};
use function Laravel\Folio\name;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

name('writer-posts.index');

$posts = computed(function () {
    return Post::with('category')
        ->where('user_id', auth()->user()->id)
        ->select('id', 'title', 'slug', 'category_id', 'status', 'user_id', 'viewer')
        ->latest()
        ->get();
});

?>

<x-admin-layout>
    <x-seo-tags :title="'Konten Berita - Admin Panel'" />
    @include('layouts.table')

    @volt
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Berita</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href="{{ route('writer-posts.create') }}" role="button">Tambah Berita</a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table wrap" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Penulis</th>
                                    <th>Judul Berita</th>
                                    <th>Kategori</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($this->posts as $no => $post)
                                    <tr>
                                        <td>{{ ++$no }}.</td>
                                        <td>
                                            {{ $post->user->name }}
                                        </td>
                                        <td>
                                            {{ $post->title }}
                                        </td>
                                        <td>
                                            <span class="badge bg-primary">{{ $post->category->name }}</span>
                                        </td>
                                        <td>
                                            <a href="{{ route('writer-posts.edit', ['post' => $post->id]) }}"
                                                class="btn btn-outline-primary btn-sm">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endvolt
</x-admin-layout>
