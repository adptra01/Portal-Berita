<?php

use function Livewire\Volt\{state, computed, usesPagination, rules};
use function Laravel\Folio\name;
use App\Models\User;

name('reports.users');

$users = computed(function () {
    return User::whereIn('role', ['Admin', 'Penulis'])
        ->latest()
        ->get();
});

?>

<x-admin-layout>
    <x-seo-tags :title="'Laporan Akun Pengguna - Admin Panel'" />
    @include('layouts.report')

    @volt
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Laporan</a>
                    </li>
                    <li class="breadcrumb-item active">Akun Pengguna</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="display table wrap" style="width: 100%">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($this->users as $no => $user)
                                    <tr>
                                        <td>{{ ++$no }}.</td>
                                        <td>
                                            {{ $user->name }}
                                        </td>
                                        <td>
                                            {{ $user->email }}
                                        </td>
                                        <td>
                                            <span class="text-uppercase">{{ $user->role }}</span>
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
