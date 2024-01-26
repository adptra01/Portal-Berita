<x-admin-layout>
    <x-slot name="title">Berita Baru</x-slot>
    @include('layouts.editor')
    @include('layouts.bs-select')

    <div class="card">
        <form action="{{ route('articles.store') }}" method="post">
            @csrf
            <div class="card-body">
                <div class="mb-3">
                    <label for="" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror"
                        value="{{ old('title') }}" name="title" id="" placeholder="Masukkan Judul Berita" />
                    @error('title')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Gambar
                        / Thumbnail</label>
                    <input type="file"
                        class="form-control @error('thumbnail')
                    is-invalid
                    @enderror"
                        name="thumbnail" id="thumbnail" placeholder="Masukkan Gambar Thumbnail Berita"
                        accept="image/*" />
                    @error('thumbnail')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 row">
                    <div class="col-md">
                        <label for="category_id" class="form-label">Kategori Berita</label>
                        <select
                            class="@error('category_id')
                        is-invalid
                        @enderror"
                            name="category_id" id="category_id">
                            <option selected disabled>Select one</option>
                            @foreach ($categories as $category)
                                <option {{ old('category_id') == $category->id ? 'selected' : '' }}
                                    value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-md">
                        <label for="status_id" class="form-label">Status Publish</label>
                        <select
                            class="@error('status_id')
                        is-invalid
                        @enderror"
                            name="status_id" id="status_id">
                            <option selected disabled>Select one</option>
                            @foreach ($statuses as $status)
                                <option {{ old('status_id') == $status->id ? 'selected' : '' }}
                                    value="{{ $status->id }}">{{ $status->name }}</option>
                            @endforeach
                        </select>
                        @error('status_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">Isi Berita</label>
                    <div class="alert alert-primary d-flex" role="alert">
                        <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
                                class="bx bx-command fs-6"></i></span>
                        <div class="d-flex flex-column ps-1">
                            <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Tips!</h6>
                            <span>Kamu dapat menggunakan kombinasi tombol CTRL + Shift + V untuk "paste" teks tanpa
                                mempertahankan format dari sumber aslinya. Hal ini berguna untuk menghindari masalah
                                format yang tidak diinginkan ketika kamu menyalin dan menempel teks dari sumber yang
                                berbeda.

                            </span>
                        </div>
                    </div>
                    <textarea id="editor" class="form-control" name="content" id="content" rows="3">
                        {{ old('content') }}
                    </textarea>
                    @error('content')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-admin-layout>
