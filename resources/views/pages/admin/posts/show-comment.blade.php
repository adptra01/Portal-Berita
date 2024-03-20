<!-- Modal trigger button -->
{{-- <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modal{{ $comment->id }}">
    Lihat
</button> --}}

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="modal{{ $comment->id }}" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content text-start">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="section-tittle">
                    <h2 class="fw-bold text-capitalize">{{ $comment->post->title }}</h2>
                    <p class="fw-normal">SIBANYU -
                        {{ $comment->post->created_at->locale('id')->diffForHumans() }}
                    </p>
                    <div class="row justify-content-start mb-4">
                        <div class="col-auto p-0 ml-3">
                            <img src="https://api.dicebear.com/7.x/lorelei/svg?seed={{ $comment->post->user->name ?? 'Penulis' }}"
                                class="rounded border-0" style="width: 55px" alt="{{ $comment->post->user->name }}"
                                loading="lazy">
                        </div>
                        <div class="col-auto">
                            <p class="m-0 fw-bold">{{ $comment->post->user->name ?? 'Admin' }}</p>
                            <small class="m-0 text-secondary">Penulis</small>
                        </div>

                    </div>
                    <h2 class="fw-bold text-capitalize">Komentar:</h2>
                    <div class="row justify-content-start mb-4">
                        <div class="col-auto p-0 ml-3">
                            <img src="https://api.dicebear.com/7.x/lorelei/svg?seed={{ $comment->user->name ?? 'Penulis' }}"
                                class="rounded border-0" style="width: 55px" alt="{{ $comment->user->name }}"
                                loading="lazy">
                        </div>
                        <div class="col-auto">
                            <p class="m-0 fw-bold">{{ $comment->user->name }}</p>
                            <small class="m-0 text-secondary">Pengunjung</small>
                        </div>

                    </div>
                    <p class="fw-normal"> {{ $comment->body }}</p>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Optional: Place to the bottom of scripts -->
<script>
    const myModal = new bootstrap.Modal(
        document.getElementById("modal{{ $comment->id }}"),
        options,
    );
</script>
