<?php

use function Livewire\Volt\{state};
use Illuminate\Validation\Rule;
use function Laravel\Folio\name;
use App\Models\User;

name('auth.user');

state(['user', 'name' => fn() => auth()->user()->name ?? '', 'email' => fn() => auth()->user()->email ?? '', 'role' => fn() => auth()->user()->role ?? '', 'password']);

$updateProfileInformation = function (user $user) {
    $user = Auth::user();

    // Memvalidasi input nama dan email dengan aturan yang telah ditentukan
    $validated = $this->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'lowercase', 'email', 'max:255', Rule::unique(User::class)->ignore($user->id)],
        'role' => 'required|in:Pengunjung,Admin,Penulis',
    ]);

    if ($this->password != null) {
        $validated['password'] = bcrypt($this->password);
    }

    $user->update($validated);

    return redirect()->route('auth.user', ['user' => $user->email]);
};

?>

<x-admin-layout>
    <x-seo-tags :title="auth()->user()->name" />

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
                </ul>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="navs-pills-top-preview" role="tabpanel">

                        <div class="alert alert-primary d-flex" role="alert">
                            <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
                                    class="bx bx-command fs-6"></i></span>
                            <div class="d-flex flex-column ps-1">
                                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Informasi</h6>
                                <span>Saat Pembuatan akun, nama pengguna digunakan untuk password akun. Jika Anda lupa kata
                                    sandi akun, solusinya adalah melakukan pengeditan pada akun untuk memperbarui informasi
                                    keamanan yang diperlukan.

                                </span>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">ID</p>
                            <div class="col-md-10">
                                <p>: {{ auth()->user()->id }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Nama</p>
                            <div class="col-md-10">
                                <p>: {{ auth()->user()->name }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Email</p>
                            <div class="col-md-10">
                                <p>: {{ auth()->user()->email }}</p>
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <p class="col-md-2 fw-bold">Role</p>
                            <div class="col-md-10">
                                <p>: <span class="badge bg-primary">{{ auth()->user()->role }}</span>
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="tab-pane fade" id="navs-pills-top-edit" role="tabpanel">
                        <form wire:submit="updateProfileInformation" method="post">
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
                                        <input type="text" class="form-control @error('name') is-invalid @enderror"
                                            wire:model="name" id="name" aria-describedby="helpId"
                                            placeholder="Tuliskan nama pengguna" />
                                        @error('name')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror"
                                            wire:model="email" id="email" aria-describedby="helpId"
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
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control @error('password') is-invalid @enderror"
                                            wire:model="password" id="password" aria-describedby="helpId"
                                            placeholder="Kosongkan atau ganti password" />
                                        @error('password')
                                            <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                @if (auth()->user()->role == 'Admin')
                                    <div class="col-md">
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Role</label>
                                            <select class="form-select @error('role') is-invalid @enderror"
                                                wire:model="role" id="role">
                                                <option disabled>Pilih satu</option>
                                                <option value="Pengunjung">Pengunjung</option>
                                                <option value="Penulis">
                                                    Penulis</option>
                                                <option value="Admin">Admin
                                                </option>
                                            </select>
                                            @error('role')
                                                <small id="helpId"
                                                    class="form-text text-danger">{{ $message }}</small>
                                            @enderror
                                        </div>
                                @endif
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
        </div>
    @endvolt
</x-admin-layout>
