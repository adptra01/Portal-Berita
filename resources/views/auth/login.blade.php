<x-auth-layout>
    <x-seo-tags :title="'Sibanyu Login Admin Panel'" />

    <form id="formAuthentication" class="mb-3" method="POST" action="{{ route('login') }}">
        @csrf
        <div class="mb-3">
            <label for="email" class="form-label">Email </label>
            <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email"
                value="{{ old('email') }}" placeholder="Enter your email" autofocus />
            @error('email')
                <small class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </small>
            @enderror
        </div>
        <div class="mb-3 form-password-toggle">
            <div class="d-flex justify-content-between">
                <label class="form-label" for="password">Kata Sandi</label>
            
            </div>
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
        <div class="mb-3">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember"
                    {{ old('remember') ? 'checked' : '' }} />
                <label class="form-check-label" for="remember"> Ingat Saya </label>
            </div>
        </div>
        <div class="mb-3">
            <button class="btn btn-primary d-grid w-100" type="submit">Masuk Akun</button>
        </div>
    </form>



</x-auth-layout>
