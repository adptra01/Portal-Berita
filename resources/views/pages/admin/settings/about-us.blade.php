<form action="{{ route('settings.updateAboutUs') }}" method="post">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <div class="alert alert-primary d-flex" role="alert">
            <span class="badge badge-center rounded-pill bg-primary border-label-primary p-3 me-2"><i
                    class="bx bx-command fs-6"></i></span>
            <div class="d-flex flex-column ps-1">
                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Tips!</h6>
                <p>Sebelum Anda mengisi profil "Tentang Kami", kami ingin memberikan beberapa panduan yang penting:</p>
                <ul>
                    <li>Pastikan informasi yang Anda masukkan akurat dan relevan dengan identitas dan misi website ini.
                    </li>
                    <li>Jangan masukkan informasi pribadi atau rahasia, seperti nomor telepon, alamat rumah, atau kata
                        sandi.</li>
                    <li>Pastikan untuk memeriksa kembali setiap detail sebelum menyimpannya.</li>
                    <li>Informasi yang Anda masukkan akan ditampilkan di halaman "Tentang Kami" dan dapat diakses oleh
                        pengunjung website.</li>
                </ul>
                <p>Dengan memahami dan menyetujui panduan di atas, Anda dapat melanjutkan untuk mengisi profil "Tentang
                    Kami".</p>

            </div>
        </div>
        <label for="about" class="form-label">Tentang Kami
            <span class="text-danger">*</span>
        </label>
        <textarea id="editor" class="form-control" name="about" id="about" rows="3">
        {{ $setting->about }}
    </textarea>
        @error('about')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        Submit
    </button>


</form>
