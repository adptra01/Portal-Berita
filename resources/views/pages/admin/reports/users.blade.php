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
    <x-slot name="title">Laporan Akun Pengguna</x-slot>
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
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Role</th>
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
