<?php

use function Livewire\Volt\{state, computed, usesPagination, rules};
use function Laravel\Folio\name;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

name('posts.index');

$destroy = function (post $post) {
    Storage::delete($post->thumbnail);
    $post->delete();
};

$posts = computed(function () {
    return Post::with('category')->select('id', 'title', 'slug', 'category_id', 'status', 'user_id', 'viewer')->latest()->get();
});

?>

<x-admin-layout>
    <x-slot name="title">Berita</x-slot>
    @include('layouts.table')

    @volt
        <div>
            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href="{{ route('posts.create') }}" role="button">Tambah Berita</a>

                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table nowrap" style="font-size: 13px">
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
                                            <a href="{{ route('posts.edit', ['post' => $post->id]) }}"
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
