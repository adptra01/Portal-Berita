<?php

use function Livewire\Volt\{state, computed};
use function Laravel\Folio\name;
use App\Models\User;

name('news.advert');

?>

<x-guest-layout>
    <x-seo-tags :title="'Info Iklan - Portal Berita Terkini Sibanyu'" :description="'Pasang iklan di Portal Berita Terkini Sibanyu dan jangkau pembaca lebih luas!'" :keywords="'pasang iklan, iklan online, iklan berita, Sibanyu, jangkau pelanggan, target audiens, peluang terbaik'" />

    @volt
        <div>

            <section class="py-5">
                <div class="container">
                    <div class="row justify-content-center text-center mb-3">
                        <div class="col-lg-8 col-xl-7">
                            <span class="text-muted">Mau Beriklan di <em class="text-primary fw-semibold">sibanyu</em>?</span>
                            <h2 class="pb-1 fw-bold">Hubungi Kami Sekarang!</h2>
                            <p>Anda memiliki produk atau layanan yang luar biasa dan ingin membagikannya dengan audiens yang
                                lebih luas? <em>sibanyu</em> adalah solusi terbaik untuk Anda!
                            </p>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item border-0 mb-3">
                                    <h2 class="accordion-header" id="headingOne"><button aria-controls="collapseOne"
                                            aria-expanded="false" class="accordion-button collapsed"
                                            data-bs-target="#collapseOne" data-bs-toggle="collapse" type="button">
                                            <div class="text-muted me-3">
                                                <svg class="bi bi-question-circle-fill" fill="currentColor" height="24"
                                                    viewbox="0 0 16 16" width="24" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z">
                                                    </path>
                                                </svg>
                                            </div>Mengapa Memilih <em>&nbsp;sibanyu</em> ?
                                        </button></h2>
                                    <div aria-labelledby="headingOne" class="accordion-collapse collapse show"
                                        data-bs-parent="#accordionExample" id="collapseOne">
                                        <div class="accordion-body">
                                            <p>
                                                <strong>1. Jangkauan Luas:</strong>
                                                Dengan ribuan pengguna setiap hari, kami
                                                menjamin eksposur
                                                tinggi bagi bisnis Anda.
                                            </p>
                                            <p>
                                                <strong>2. Dukungan Penuh:</strong>
                                                Tim kami siap membantu Anda dalam setiap
                                                langkah dari proses
                                                periklanan.
                                            </p>
                                            <p>
                                                <strong>3. Penargetan Tepat Sasaran:</strong>
                                                Kami menawarkan penargetan yang
                                                presisi, memastikan
                                                iklan Anda sampai pada orang yang benar-benar tertarik.
                                            </p>
                                            <p>
                                                <strong>4. Fleksibilitas dan Penyesuaian:</strong>
                                                Kami mendengarkan kebutuhan Anda
                                                dan
                                                menyediakan solusi yang sesuai dengan anggaran dan tujuan periklanan Anda.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item border-0 mb-3">
                                    <h2 class="accordion-header" id="headingTwo"><button aria-controls="collapseTwo"
                                            aria-expanded="false" class="accordion-button collapsed"
                                            data-bs-target="#collapseTwo" data-bs-toggle="collapse" type="button">
                                            <div class="text-muted me-3">
                                                <svg class="bi bi-question-circle-fill" fill="currentColor" height="24"
                                                    viewbox="0 0 16 16" width="24" xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM5.496 6.033h.825c.138 0 .248-.113.266-.25.09-.656.54-1.134 1.342-1.134.686 0 1.314.343 1.314 1.168 0 .635-.374.927-.965 1.371-.673.489-1.206 1.06-1.168 1.987l.003.217a.25.25 0 0 0 .25.246h.811a.25.25 0 0 0 .25-.25v-.105c0-.718.273-.927 1.01-1.486.609-.463 1.244-.977 1.244-2.056 0-1.511-1.276-2.241-2.673-2.241-1.267 0-2.655.59-2.75 2.286a.237.237 0 0 0 .241.247zm2.325 6.443c.61 0 1.029-.394 1.029-.927 0-.552-.42-.94-1.029-.94-.584 0-1.009.388-1.009.94 0 .533.425.927 1.01.927z">
                                                    </path>
                                                </svg>
                                            </div>Langkah Mudah untuk Memulai!!!
                                        </button></h2>
                                    <div aria-labelledby="headingTwo" class="accordion-collapse collapse"
                                        data-bs-parent="#accordionExample" id="collapseTwo">
                                        <div class="accordion-body">
                                            <p>
                                                <strong>
                                                    1. Hubungi Pihak Admin:
                                                </strong>
                                                Isi formulir kontak di bawah ini untuk menghubungi tim kami.
                                            </p>
                                            <p>
                                                <strong>
                                                    2. Diskusi Kebutuhan Anda:
                                                </strong>
                                                Kami akan mendengarkan kebutuhan iklan Anda dan memberikan solusi terbaik.
                                            </p>
                                            <p>
                                                <strong>
                                                    3. Penyusunan Paket Iklan:</strong>
                                                Kami akan menyesuaikan paket iklan sesuai dengan tujuan
                                                dan anggaran Anda.

                                            </p>
                                            <p>
                                                <strong>
                                                    4. Mulai Beriklan:
                                                </strong>
                                                Setelah persetujuan, iklan Anda akan tayang dan membawa dampak
                                                positif pada bisnis Anda.
                                            </p>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <a class="genric-btn primary rounded" href="#">
                            Hubungi
                        </a>
                    </div>
                </div>
            </section>
        </div>
    @endvolt

</x-guest-layout>
