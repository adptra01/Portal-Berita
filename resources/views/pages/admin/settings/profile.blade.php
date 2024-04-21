<div class="section mb-4">
    <!-- Account -->
    <div class="section">
        <div class="row justify-content-between gap-4">
            @if ($setting)
                <div class="col-auto">
                    <figure>
                        <img src="{{ Storage::url($setting->logo) }}" alt="user-avatar"
                            class="d-block rounded border {{ !$setting->logo ? 'placeholder' : '' }}" height="200"
                            width="auto" style="object-fit: cover" id="uploadedLogo">
                        <figcaption class="text-center">Logo Website</figcaption>
                    </figure>
                </div>
                <div class="col-auto">
                    <figure>
                        <img src="{{ Storage::url($setting->icon) }}" alt="user-avatar"
                            class="d-block rounded border {{ !$setting->icon ? 'placeholder' : '' }}" height="200"
                            width="200" style="object-fit: cover" id="uploadedIcon">
                        <figcaption class="text-center">Icon Website</figcaption>
                    </figure>
                </div>
            @endif
        </div>
    </div>
    <div class="section">
        <form action="{{ route('settings.updateProfile') }}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row">

                <div class="mb-3 col-md-6">
                    <label for="title" class="form-label">Nama Website</label>
                    <input type="text" class="form-control" name="title" value="{{ $setting->title ?? null }}"
                        id="title" aria-describedby="title" placeholder="Enter your title website" />
                    @error('title')
                        <small id="title" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="copyright" class="form-label">copyright</label>
                    <input type="text" class="form-control" name="copyright"
                        value="{{ $setting->copyright ?? null }}" id="copyright" aria-describedby="copyright"
                        placeholder="Enter your copyright website" />
                    @error('copyright')
                        <small id="copyright" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="logo" class="form-label">logo</label>
                    <input type="file" class="form-control" name="logo" id="logo" aria-describedby="logo" />
                    @error('logo')
                        <small id="logo" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="icon" class="form-label">icon</label>
                    <input type="file" class="form-control" name="icon" id="icon" aria-describedby="icon" />
                    @error('icon')
                        <small id="icon" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="contact" class="form-label">contact</label>
                    <input type="number" class="form-control" name="contact" value="{{ $setting->contact ?? null }}"
                        id="contact" aria-describedby="contact" placeholder="Enter your contact website" />
                    @error('contact')
                        <small id="contact" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="whatsapp" class="form-label">whatsapp</label>
                    <input type="number" class="form-control" name="whatsapp" value="{{ $setting->whatsapp ?? null }}"
                        id="whatsapp" aria-describedby="whatsapp" placeholder="Enter your whatsapp website" />
                    @error('whatsapp')
                        <small id="whatsapp" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="facebook" class="form-label">facebook</label>
                    <input type="text" class="form-control" name="facebook"
                        value="{{ $setting->facebook ?? null }}" id="facebook" aria-describedby="facebook"
                        placeholder="Enter your facebook website" />
                    @error('facebook')
                        <small id="facebook" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="twitter" class="form-label">twitter</label>
                    <input type="text" class="form-control" name="twitter"
                        value="{{ $setting->twitter ?? null }}" id="twitter" aria-describedby="twitter"
                        placeholder="Enter your twitter website" />
                    @error('twitter')
                        <small id="twitter" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="instagram" class="form-label">instagram</label>
                    <input type="text" class="form-control" name="instagram"
                        value="{{ $setting->instagram ?? null }}" id="instagram" aria-describedby="instagram"
                        placeholder="Enter your instagram website" />
                    @error('instagram')
                        <small id="instagram" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3 col-md-6">
                    <label for="youtube" class="form-label">youtube</label>
                    <input type="text" class="form-control" name="youtube"
                        value="{{ $setting->youtube ?? null }}" id="youtube" aria-describedby="youtube"
                        placeholder="Enter your youtube website" />
                    @error('youtube')
                        <small id="youtube" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Deskripsi Website</label>
                    <textarea class="form-control" name="description" id="description" cols="30" rows="10">{{ $setting->description ?? null }}
                    </textarea>
                    @error('description')
                        <small id="description" class="form-text text-danger">{{ $message }}</small>
                    @enderror
                </div>

            </div>
            <div class="mt-2">
                <button type="submit" class="btn btn-primary me-2">Submit</button>
            </div>
            <input type="hidden">
        </form>
    </div>
    <!-- /Account -->
</div>
