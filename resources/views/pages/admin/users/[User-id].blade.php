<?php

use function Livewire\Volt\{state};
use function Laravel\Folio\name;
use App\Models\User;

name('users.edit');

state(['user']);

$destroy = function (user $user) {
    $user->delete();

    return redirect()->route('users.index')->with('success', 'Akun pengguna telah dihapus secara permanen dan tidak dapat dipulihkan.!');
};

?>

<x-admin-layout>
    <x-slot name="title">{{ $user->name }}</x-slot>

    @volt
        <div>
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
                            Edit Akun</button>
                    </li>
                    <li class="nav-item col-md">
                        <button class="nav-link" role="tab" data-bs-toggle="tab"
                            wire:click='destroy({{ $user->id }})'
                            wire:confirm.prompt="Yakin ingin menghapus akun {{ $user->name }}?\n\nTulis 'hapus' untuk konfirmasi!|hapus"
                            wire:loading.attr="disabled">
                            <i class='bx bx-trash'></i>
                            Hapus Akun</button>
                    </li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-top-preview" role="tabpanel">

                        <div class="alert alert-primary d-flex" role="alert">
                            <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
                                    class="bx bx-command fs-6"></i></span>
                            <div class="d-flex flex-column ps-1">
                                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Informasi</h6>
                                <span>Saat Pembuatan akun, nama pengguna digunakan untuk password akun. Jika Anda lupa kata sandi akun, solusinya adalah melakukan pengeditan pada akun untuk memperbarui informasi keamanan yang diperlukan.

                                </span>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">ID</p>
                            <div class="col-md-10">
                                <p>: {{ $user->id }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Nama</p>
                            <div class="col-md-10">
                                <p>: {{ $user->name }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Email</p>
                            <div class="col-md-10">
                                <p>: {{ $user->email }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Telp</p>
                            <div class="col-md-10">
                                <p>: {{ $user->telp }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Role</p>
                            <div class="col-md-10">
                                <p>: <span class="badge bg-primary">{{ $user->role }}</span>
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-edit" role="tabpanel">
                        <form action="{{ route('users.update', $user->id) }}" method="post">
                            @csrf
                            @method('PUT')

                            <div class="alert alert-primary d-flex" role="alert">
                                <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
                                        class="bx bx-command fs-6"></i></span>
                                <div class="d-flex flex-column ps-1">
                                    <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Informasi</h6>
                                    <span>Jika Anda tidak ingin mengubah password akun, biarkan form password kosong</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Nama Akun</label>
                                        <input type="text" value="{{ $user->name }}"
                                            class="form-control @error('name') is-invalid @enderror" name="name"
                                            id="name" aria-describedby="helpId" placeholder="Tuliskan nama pengguna" />
                                        @error('name')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">email</label>
                                        <input type="email" value="{{ $user->email }}"
                                            class="form-control @error('email') is-invalid @enderror" name="email"
                                            id="email" aria-describedby="helpId"
                                            placeholder="Tuliskan email pengguna" />
                                        @error('email')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md">
                                    <div class="mb-3">
                                        <label for="telp" class="form-label">telp</label>
                                        <input type="number" value="{{ $user->telp }}"
                                            class="form-control @error('telp') is-invalid @enderror" name="telp"
                                            id="telp" aria-describedby="helpId"
                                            placeholder="Tuliskan telp pengguna" />
                                        @error('telp')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="mb-3">
                                        <label for="role" class="form-label">Role</label>
                                        <select class="form-select @error('role') is-invalid @enderror" name="role"
                                            id="role">
                                            <option disabled>Select one</option>
                                            <option {{ $user->role == 'Pengunjung' ? 'selected' : '' }}
                                                value="Pengunjung">Pengunjung</option>
                                            <option {{ $user->role == 'Penulis' ? 'selected' : '' }} value="Penulis">
                                                Penulis</option>
                                            <option {{ $user->role == 'Admin' ? 'selected' : '' }} value="Admin">Admin
                                            </option>
                                        </select>
                                        @error('role')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="mb-3">
                                    <label for="password" class="form-label">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror"
                                        name="password" id="password" aria-describedby="helpId"
                                        placeholder="Kosongkan atau ganti password" />
                                    @error('password')
                                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="text-end">
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
