<x-admin-layout>
    <x-slot name="title">Berita Baru</x-slot>
    @push('css')
        <!-- Include stylesheet -->
        <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    @endpush
    @push('scripts')
        <!-- Include the Quill library -->
        <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
        <script>
            var quill = new Quill('#editor', {
                theme: 'snow'
            });
        </script>
    @endpush

    <p> 'title', 'slug', 'category_id', 'content', 'user_id',
    </p>
    <div class="card">
        <div class="card-body">
            <div class="mb-3">
                <label for="" class="form-label">Judul Berita</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" wire:model=""
                    id="" placeholder="Masukkan Judul Berita" />
                @error('title')
                    <div class="invalid-feedback">
                        Please enter a message in the textarea.
                    </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="categoriesDataList" class="form-label">Kategori Berita</label>
                <input
                    class="form-control
                @error('record')
                is-invalid
                @enderror"
                    list="datalistOptions" id="categoriesDataList" placeholder="Pilih Kategori Berita"
                    wire:model='category_id'>
                <datalist id="datalistOptions">
                    <option value="San Francisco">
                    <option value="New York">
                    <option value="Seattle">
                    <option value="Los Angeles">
                    <option value="Chicago">
                </datalist>
            </div>
            <div class="mb-3">
                <label for="" class="form-label"></label>
                <textarea id="editor" class="form-control" name="" id="" rows="3"></textarea>
            </div>


        </div>
    </div>
</x-admin-layout>
