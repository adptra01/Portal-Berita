<?php
use function Livewire\Volt\{state};
use function Laravel\Folio\name;

name('adverts.create');

?>
<x-admin-layout>
    <x-slot name="title">Create Advers</x-slot>
    @volt
        <div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="#">Beranda</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="#">Iklan</a>
                    </li>
                    <li class="breadcrumb-item active">Buat Iklan</li>
                </ol>
            </nav>
            <div class="card">
                <div class="card-body">

                    <form action="{{ route('adverts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Iklan <strong
                                        class="text-danger">*</strong></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" id="name" value="{{ old('name') }}" aria-describedby="name"
                                    placeholder="Input name advert" />
                                @error('name')
                                    <small id="name" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="mb-3">
                                <label for="link" class="form-label">Link Iklan <strong
                                        class="text-danger">*</strong></label>
                                <input type="text" class="form-control @error('link') is-invalid @enderror"
                                    name="link" id="link" value="{{ old('link') }}" aria-describedby="link"
                                    placeholder="Input link advert" />
                                @error('link')
                                    <small id="link" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="image" class="form-label">Gambar Iklan <strong
                                            class="text-danger">*</strong></label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror"
                                        name="image" id="image" aria-describedby="image"
                                        placeholder="Input image advert" required />
                                    @error('image')
                                        <small id="image" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="alt" class="form-label">Alt (Deskripsi Singkat) Gambar <strong
                                            class="text-danger">*</strong></label>
                                    <input type="text" class="form-control @error('alt') is-invalid @enderror"
                                        name="alt" id="alt" value="{{ old('alt') }}" aria-describedby="alt"
                                        placeholder="Input alt advert" />
                                    @error('alt')
                                        <small id="alt" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="start_date" class="form-label">Tanggal Mulai Iklan <strong
                                            class="text-danger">*</strong></label>
                                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                                        name="start_date" id="start_date" value="{{ old('start_date') }}"
                                        aria-describedby="start_date" placeholder="Input start_date advert" />
                                    @error('start_date')
                                        <small id="start_date" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="end_date" class="form-label">Tanggal Berakhir Iklan <strong
                                            class="text-danger">*</strong></label>
                                    <input type="date" class="form-control @error('end_date') is-invalid @enderror"
                                        name="end_date" id="end_date" value="{{ old('end_date') }}"
                                        aria-describedby="end_date" placeholder="Input end_date advert" />
                                    @error('end_date')
                                        <small id="end_date" class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status Iklan <strong
                                            class="text-danger">*</strong></label>
                                    <select class="form-select @error('status') is-invalid @enderror" name="status"
                                        id="status">
                                        <option selected disabled>Select one</option>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Aktif
                                        </option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Non Aktif
                                        </option>
                                    </select>
                                </div>
                                @error('status')
                                    <small id="status" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-md">
                                <div class="mb-3">
                                    <label for="position" class="form-label">position Iklan <strong
                                            class="text-danger">*</strong></label>
                                    <select class="form-select @error('position') is-invalid @enderror" name="position"
                                        id="position">
                                        <option selected disabled>Select one</option>
                                        <option value="top" {{ old('position') == 'top' ? 'selected' : '' }}>Atas
                                        </option>
                                        <option value="side" {{ old('position') == 'side' ? 'selected' : '' }}>Samping
                                        </option>
                                        <option value="popup" {{ old('position') == 'popup' ? 'selected' : '' }}>Popup
                                            (Muncul
                                            Tiba-tiba)</option>
                                    </select>
                                </div>
                                @error('position')
                                    <small id="position" class="form-text text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col text-md-end text-center">
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
