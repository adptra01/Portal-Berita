<x-auth-layout>
    <x-slot name="title">Register</x-slot>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <form id="formAuthentication" class="mb-3" action="index.html" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                    value="{{ old('name') }}" name="name" placeholder="Enter your name" autofocus />
                @error('name')
                    <small class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                    value="{{ old('email') }}" name="email" placeholder="Enter your email" />
                @error('email')
                    <small class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </small>
                @enderror
            </div>

            <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Kata Sandi</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror"
                        name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    @error('password')
                        <small class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
            </div>
            <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password_confirmation">Ulangi Kata Sandi</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password_confirmation"
                        class="form-control @error('password_confirmation') is-invalid @enderror"
                        name="password_confirmation"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password_confirmation" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    @error('password_confirmation')
                        <small class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </small>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="terms-conditions" name="terms" required />
                    <label class="form-check-label" for="terms-conditions">
                        Saya setuju dengan
                        <a href="javascript:void(0);">Kebijakan Privasi & Ketentuan yang Berlaku</a>
                    </label>
                </div>
            </div>
            <button class="btn btn-primary d-grid w-100">Daftar Akun</button>

        </form>

        <div class="divider">
            <div class="divider-text">Atau</div>
        </div>

        <a href="{{ route('redirect') }}" class="btn btn-danger w-100 mb-3">
            <span class="tf-icons bx bxl-google"></span>
            Masuk dengan Google
        </a>

        <p class="text-center mt-3">
            <span>Sudah Punya AKun?</span>
            <a href="/login">
                <span>Lanjut Masuk</span>
            </a>
        </p>
    </form>


</x-auth-layout>
