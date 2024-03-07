<?php

use function Livewire\Volt\{state, computed, rules};
use App\Models\Comment;
use App\Models\User;

state(['post', 'user_id', 'post_id', 'body']);
rules([
    'body' => 'required|min:5|string',
]);

$comments = computed(function () {
    return Comment::where('post_id', $this->post->id)
        ->where('status', true)
        ->get();
});

$userComment = computed(function () {
    if (auth()->check()) {
        return Comment::where('user_id', auth()->user()->id)
            ->where('post_id', $this->post->id)
            ->get();
    } else {
        return collect();
    }
});

$saveComment = function () {
    $post = $this->post;

    $validateData = $this->validate();
    $validateData['post_id'] = $post->id;

    if (auth()->check()) {
        $validateData['user_id'] = auth()->user()->id;

        $comment = Comment::create($validateData);

        $this->reset('body');
    } else {
        return redirect()->route('login');
    }
};
?>
<div>
    <div class="comments-area p-0 border-0">
        <h4>{{ $this->comments->count() }} Komentar</h4>
        @foreach ($this->comments as $comment)
            <div class="comment-list">
                <div class="single-comment justify-content-between d-flex">
                    <div class="user justify-content-between d-flex">
                        <div class="thumb">
                            <img src="https://api.dicebear.com/7.x/lorelei/svg?seed={{ $comment->user->name }}"
                                alt="{{ $comment->user->name }}">
                        </div>
                        <div class="desc">
                            <div class="d-flex justify-content-between">
                                <div class="d-flex align-items-center">
                                    <h5>
                                        <a>{{ $comment->user->name }}</a>
                                    </h5>
                                    <p class="date">{{ $comment->created_at->diffForHumans() }}</p>
                                </div>
                            </div>
                            <p class="comment text-break">
                                {{ $comment->body }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="comment">
        @if ($this->userComment->isEmpty())
            <h4></h4>
            <form class="form-contact comment_form" wire:submit.prevent="saveComment" id="commentForm">
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <textarea class="form-control @error('body') border-danger @else border-primary @enderror w-100 rounded"
                                wire:model.lazy="body" id="body" cols="30" rows="10" placeholder="Tulis Komentar..."></textarea>
                            @error('body')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <button type="submit" class="genric-btn primary-border rounded">Submit</button>
                </div>
            </form>
        @endif
    </div>
</div>
