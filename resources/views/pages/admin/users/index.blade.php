<?php

use function Livewire\Volt\{state, computed, usesPagination, rules};
use function Laravel\Folio\name;
use App\Models\User;

name('users.index');

$users = computed(function () {
    return User::whereIn('role', ['Admin', 'Penulis'])
        ->with('posts')
        ->latest()
        ->get();
});

?>

<x-admin-layout>
    <x-slot name="title">Akun Pengguna</x-slot>
    @include('layouts.table')

    @volt
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Beranda</a>
                    </li>
                    <li class="breadcrumb-item active">Akun Pengguna</li>
                </ol>
            </nav>

            <div class="card">
                <div class="card-header">
                    <a class="btn btn-primary" href="{{ route('users.create') }}" role="button">Tambah
                        Akun</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table nowrap" style="font-size: 13px; width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Berita Terbuat</th>
                                    <th>Telp</th>
                                    <th>Role</th>
                                    <th>#</th>
                                </tr>
                            </thead>
                            <tbody class="table-border-bottom-0">
                                @foreach ($this->users as $no => $user)
                                    <tr>
                                        <td>{{ ++$no }}.</td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->role == 'Pengunjung' ? '-' : $user->posts->count() . ' Berita' }}
                                        </td>
                                        <td>
                                            {{ $user->telp }}
                                        </td>
                                        <td>
                                            <span class="badge bg-primary"> {{ $user->role }}</span>

                                        </td>
                                        <td>
                                            <a class="btn btn-outline-primary btn-sm"
                                                href="{{ route('users.edit', ['user' => $user]) }}"
                                                role="button">Detail</a>
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
