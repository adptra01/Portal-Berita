<?php

use function Livewire\Volt\{state, mount};
use Carbon\Carbon;
use App\Models\Advert;
use Illuminate\Support\Facades\Cache;

state(['popAdverts']);

mount(function () {
    $this->popAdverts = Advert::wherePosition('popup')->where('end_date', '>=', today())->select('link', 'image', 'alt')->orderBy('updated_at')->first();
});

?>

<div>
    <!-- Modal -->
    @if ($popAdverts)
        <div class="modal fade" id="exampleModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content border-0" style="background: none">
                    <div class="modal-header p-0 m-0 border-0">
                        <button type="button" class="btn-close btn-close-dark p-3 rounded-circle bg-white"
                            data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <a href="{{ $popAdverts->link }}" target="_blank" rel="noopener noreferrer">
                            <img src="{{ Storage::url($popAdverts->image) }}" class="img-fluid rounded w-100"
                                alt="{{ $popAdverts->name }}" loading="eager" />
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <script>
            document.addEventListener("DOMContentLoaded", function() {
                var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {
                    keyboard: false
                });
                setTimeout(() => {
                    myModal.show();
                }, 1000); // Delay 1 detik sebelum menampilkan modal
            });
        </script>
    @endif
</div>
