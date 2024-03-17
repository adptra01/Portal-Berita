<?php

use function Livewire\Volt\{state, computed, rules};
use App\Models\Comment;
use App\Models\User;

state(['post', 'user_id', 'post_id', 'body', 'commentId']);
rules([
    'body' => 'required|min:5|string',
]);

$comments = computed(function () {
    return Comment::where('post_id', $this->post->id)
        ->where('status', true)
        ->get();
});

$deleteComment = function (comment $comment) {
    $comment->delete();
    $this->reset('user_id', 'post_id', 'body', 'commentId');
};

$editComment = function (comment $comment) {
    $comment = Comment::find($comment->id);

    $this->commentId = $comment->id;
    $this->user_id = $comment->user_id;
    $this->post_id = $comment->post_id;
    $this->body = $comment->body;
};

$saveComment = function () {
    $post = $this->post;

    $validateData = $this->validate();
    $validateData['post_id'] = $post->id;

    if (auth()->check()) {
        if ($this->commentId == null) {
            $validateData['user_id'] = auth()->user()->id;
            $comment = Comment::create($validateData);

            $this->reset('user_id', 'post_id', 'body', 'commentId');
        } else {
            $comment = Comment::find($this->commentId)->update($validateData);

            $this->reset('user_id', 'post_id', 'body', 'commentId');
        }
    } else {
        return redirect()->route('login');
    }
};
?>
<div>
    <div class="comments-area p-0 border-0">
        <h4>{{ $this->comments->count() }} Komentar</h4>
        @foreach ($this->comments as $comment)
            <div class="comment-list mb-3 p-0">
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        <div class="thumb">
                            <img src="https://api.dicebear.com/7.x/lorelei/svg?seed={{ $comment->user->name }}"
                                alt="{{ $comment->user->name }}">
                        </div>
                        <div class="desc">
                            <div class="row mb-3">
                                <h5 class="col-md">
                                    {{ $comment->user->name }}
                                </h5>
                                <small class="col-md text-md-end">{{ $comment->created_at->diffForHumans() }}</small>
                            </div>
                            <p class="comment text-break">
                                {{ $comment->body }}
                            </p>
                            <div class="row">
                                @if (auth()->check() && $comment->user->id == auth()->user()->id)
                                    <div class="gap-5">
                                        <button wire:click='editComment({{ $comment->id }})'
                                            class="text-muted fw-semibold border-0 bg-body">
                                            <i class="bx bx-edit-alt me-1"></i>
                                            Edit
                                        </button>
                                        <span class="mx-3">|</span>
                                        <button wire:click='deleteComment({{ $comment->id }})'
                                            class="text-muted fw-semibold border-0 bg-body">
                                            <i class="bx bx-trash me-1"></i>
                                            Hapus
                                        </button>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="comment mt-5 pt-5">
        <form class="form-contact comment_form" wire:submit.prevent="saveComment" id="commentForm">
            <div class="row">
                <div class="col-12">
                    <div class="form-group">
                        <textarea class="form-control @error('body') border-danger @enderror w-100 rounded" wire:model="body" id="body"
                            cols="30" rows="10" placeholder="Tulis Komentar...">
                        </textarea>
                        @error('body')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form-group">
                <button type="submit" class="genric-btn primary rounded">Submit</button>

                <p wire:loading>loading</p>
            </div>
        </form>
    </div>
</div>
