<?php

use function Livewire\Volt\{state, computed, usesPagination, rules};
use function Laravel\Folio\name;
use App\Models\Category;
use App\Models\User;
use App\Models\Post;

name('reports.posts');

$posts = computed(function () {
    return Post::with('category')->latest()->get();
});

?>

<x-admin-layout>
    <x-slot name="title">Berita</x-slot>
    @include('layouts.table')

    @volt
        <div>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table nowrap" style="font-size: 13px">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Penulis</th>
                                    <th>Judul Berita</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Dilihat</th>
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
                                            <span class="text-uppercase">{{ $post->category->name }}</span>
                                        </td>
                                        <td>
                                            {{ $post->status == true ? 'Terbit' : 'Tidak Terbit' }}
                                        </td>
                                        <td>
                                            {{ $post->viewer }}
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
