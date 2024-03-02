<?php

use function Livewire\Volt\{state, computed};
use function Laravel\Folio\name;
use App\Models\User;

name('news.about-us');

State([
    'teams' => fn() => User::where('role', 'Penulis')->get(),
]);

?>

<x-guest-layout>
    <x-slot name="title">Tentang Kami</x-slot>

    @volt
        <div>
            <div class="container py-5">
                <div class="text-base text-center">
                    <h2 class="fw-bold">Tentang Kami</h2>
                    <p><em>sibanyu</em> adalah Koran Digital yang menjadi sumber utama berita dan informasi
                        terkini. Dengan fokus pada berita lokal, nasional, dan internasional, kami menyajikan
                        informasi terbaru tentang berbagai topik yang relevan dengan masyarakat. Tim redaksi kami
                        bekerja keras untuk memberikan liputan yang komprehensif dan terpercaya, serta
                        artikel-artikel berkualitas yang mengulas isu-isu penting dalam masyarakat.
                    </p>
                    <p>
                        Kami berkomitmen untuk menjadi mitra informasi terpercaya bagi pembaca setia kami. Dengan
                        mengusung semangat pemberitaan yang objektif dan akurat, <em>ibanyu</em> bertekad untuk tetap
                        menjadi sumber berita yang dapat diandalkan dalam menyajikan informasi terkini dan
                        bermanfaat bagi pembaca dari berbagai kalangan.
                    </p>
                    <p>
                        Terima kasih telah mempercayai <em>sibanyu</em> sebagai sumber informasi Anda. Kami senantiasa
                        berusaha memberikan layanan terbaik dan menjadi jembatan komunikasi yang menghubungkan
                        pembaca dengan dunia sekitarnya.
                    </p>
                </div>
            </div>

            <section class="py-5">
                <div class="container">
                    <div class="row justify-content-center text-center mb-2 mb-lg-4">
                        <div class="col-12 col-lg-8 col-xxl-7 text-center mx-auto">
                            <h2 class="fw-bold">Temui Tim</h2>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        @foreach ($teams as $team)
                            <div class="col-md-6 col-lg-3">
                                <div class="card text-center border-0 mb-3">
                                    <div class="card-body p-3">
                                        <div class="mb-4 mx-lg-3 mx-xxl-5">
                                            <img class="img-fluid rounded-circle w-50"
                                                src="https://api.dicebear.com/7.x/lorelei/svg?seed={{ $team->name }}" loading="eager">
                                        </div>
                                        <h5 class="fw-bold">{{ $team->name }}</h5>
                                        <div class="text-muted">
                                            {{ $team->role }}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </section>

            <div class="container bg-secondary-subtle py-5 mt-5">
                <div class="row justify-content-center text-center">
                    <div class="col-lg-8">
                        <h2 class="fw-bold">Berlangganan Hari Ini</h2>
                        <p class="lead">Langganan Sekarang dan Dapatkan Akses terbaru ke konten eksklusif, update terkini,
                            dan informasi terbaru yang relevan dengan kebutuhan Anda!
                        </p>
                        <div class="mx-auto col-md-8 col-xl-7 col-xxl-6 mt-3">
                            <div class="input-group mb-3">
                                <input class="form-control bg-light" placeholder="Email address" type="text"> <button
                                    class="btn btn-primary" type="button">Subscribe</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    @endvolt

</x-guest-layout>
