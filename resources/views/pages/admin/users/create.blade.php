<?php

use function Livewire\Volt\{state};
use function Laravel\Folio\name;
use App\Models\User;

name('users.create');

?>

<x-admin-layout>
    <x-slot name="title">Buat Akun Pengguna</x-slot>

    @volt
        <div>
            <div class="card">
                <div class="card-header">
                    <div class="alert alert-primary d-flex" role="alert">
                        <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
                                class="bx bx-command fs-6"></i></span>
                        <div class="d-flex flex-column ps-1">
                            <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Informasi</h6>
                            <span><strong>Password akun</strong> akan dibuat menggunakan <strong>nama</strong> yang Anda masukkan. Pastikan
                                <strong>nama</strong> yang Anda
                                inputkan sesuai dengan kebutuhan dan mudah diingat untuk mengakses akun Anda
                                nantinya.</span>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('users.store') }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Nama Akun</label>
                                    <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror"
                                        name="name" id="name" aria-describedby="helpId" placeholder="Tuliskan nama pengguna" />
                                    @error('name')
                                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="email" class="form-label">email</label>
                                    <input type="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror"
                                        name="email" id="email" aria-describedby="helpId" placeholder="Tuliskan email pengguna" />
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
                                    <input type="number" value="{{ old('telp') }}" class="form-control @error('telp') is-invalid @enderror"
                                        name="telp" id="telp" aria-describedby="helpId" placeholder="Tuliskan telp pengguna" />
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
                                        <option selected disabled>Select one</option>
                                        <option value="Pengunjung">Pengunjung</option>
                                        <option value="Penulis">Penulis</option>
                                        <option value="Admin">Admin</option>
                                    </select>
                                    @error('role')
                                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
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
    @endvolt
</x-admin-layout>
