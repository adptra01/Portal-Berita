<?php

use function Livewire\Volt\{state, computed, usesPagination};
use function Laravel\Folio\name;
use App\Models\Comment;
use App\Models\User;

name('comments.index');
usesPagination(theme: 'bootstrap');

state(['search'])->url();

state(['status']);

$comments = computed(function () {
    $query = comment::with(['post', 'user']);

    if ($this->search) {
        // Mencocokkan input dengan status true (aktif)
        if (strtolower($this->search) === 'aktif') {
            $query->where('status', true);
        }
        // Mencocokkan input dengan status false (tidak aktif)
        elseif (strtolower($this->search) === 'tidak' || strtolower($this->search) === 'tidak aktif') {
            $query->where('status', false);
        }
        // Mencocokkan input dengan nama user atau body
        else {
            $query
                ->whereHas('user', function ($userQuery) {
                    $userQuery->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhere('body', 'like', '%' . $this->search . '%');
        }
    }

    return $query->latest()->paginate(10);
});

$publishComment = function (comment $comment) {
    $comment = comment::find($comment->id);
    $comment->update([
        'status' => true,
    ]);
};

$unPublishComment = function (comment $comment) {
    $comment = comment::find($comment->id);
    $comment->update([
        'status' => false,
    ]);
};

$destroy = function (comment $comment) {
    $comment->delete();
};

?>

<x-admin-layout>
    <x-slot name="title">Akun Pengguna</x-slot>

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
                    <li class="breadcrumb-item active">Komentar
                    </li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-header">
                    <input type="search" class="form-control" wire:model.live="search" aria-describedby="search"
                        placeholder="Input pencarian..." />
                </div>
                <div class="card-body">
                    <div class="table-responsive rounded">
                        <table class="table table-hover text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Komentar</th>
                                    <th>Status</th>
                                    <th>Pilihan</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($this->comments as $no => $comment)
                                    <tr>
                                        <td>{{ ++$no }}.</td>
                                        <td>
                                            {{ $comment->user->name }}
                                        </td>
                                        <td>
                                            {{ Str::limit($comment->body, 50, '...') }}
                                        </td>
                                        <td>
                                            {{ $comment->status == true ? 'Aktif' : 'Tidak Aktif' }}
                                            <i wire:loading class="bx bx-loader bx-spin text-primary"></i>

                                        </td>
                                        <td>
                                            <button type="button" class="my-2 btn btn-primary btn-sm"
                                                wire:click='publishComment({{ $comment->id }})'>Aktif</button>

                                            <button type="button" class="my-2 btn btn-danger btn-sm"
                                                wire:click='unPublishComment({{ $comment->id }})'>Tidak Aktif</button>

                                            @include('pages.admin.posts.show-comment')

                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                    data-bs-toggle="dropdown"><i
                                                        class="bx bx-dots-vertical-rounded"></i></button>
                                                <div class="dropdown-menu">
                                                    <a class="dropdown-item" data-bs-toggle="modal"
                                                        data-bs-target="#modal{{ $comment->id }}"><i
                                                            class="bx bx-file me-2"></i>Lihat</a>
                                                    <a class="dropdown-item" wire:click='destroy({{ $comment->id }})'
                                                        wire:confirm.prompt="Yakin Ingin Menghapus?\n\nTulis 'hapus' untuk konfirmasi!|hapus"
                                                        wire:loading.attr="disabled"><i
                                                            class="bx bx-trash me-2"></i>Hapus</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="my-4 row align-items-center">
                        <div class="col-md">
                            {{ $this->comments->links() }}
                        </div>
                        <div class="col-md text-end">
                            <p>Menampilkan {{ $this->comments->count() }} hasil</p>
                        </div>
                    </div>
                </div>
            </div>
            modal
        </div>
    @endvolt
</x-admin-layout>
