<?php

use function Livewire\Volt\{state, rules};
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactUs;

state(['name', 'email', 'message']);

rules(['name' => 'required|min:6', 'email' => 'required|email', 'message' => 'required|string']);

$submit = function () {
    $data = $this->validate();

    Mail::to('sibanyu68@gmail.com')->send(new ContactUs($data));

    $this->reset(['name', 'email', 'message']);
};

?>

<div>
    <form wire:submit.prevent="submit">
        <div class="justify-content-center">
            <div class="mb-3">
                <label for="name" class="form-label">Nama Lengkap</label>
                <input type="text"
                    class="form-control @error('name')
                border-danger
                @enderror"
                    wire:model="name" id="name" aria-describedby="helpId" placeholder="Input your name" />
                @error('name')
                    <small id="helpId" class="form-text text-danger fw-bold">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email"
                    class="form-control @error('email')
                border-danger
                @enderror"
                    wire:model="email" id="email" aria-describedby="helpId" placeholder="Input your email" />
                @error('email')
                    <small id="helpId" class="form-text text-danger fw-bold">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Pesan</label>
                <textarea class="form-control @error('message')
                border-danger
                @enderror"
                    wire:model="message" id="message" rows="5" placeholder="Input your message"></textarea>
                @error('message')
                    <small id="helpId" class="form-text text-danger fw-bold">{{ $message }}</small>
                @enderror
            </div>

            <div class="col-md-4">
                <div class="d-flex justify-content-start align-items-center">
                    <button class="genric-btn primary rounded" type="submit">SUBMIT</button>
                    <div class="ml-5" wire:loading> <i class='bx bx-loader bx-spin bx-sm'></i>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
