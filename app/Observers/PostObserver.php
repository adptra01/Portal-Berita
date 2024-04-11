<?php

namespace App\Observers;

use App\Models\Post;
use Illuminate\Support\Facades\Cache;

class PostObserver
{
    public function created(Post $post)
    {
        Cache::forget('posts');
        Cache::forget('latest_news');
        Cache::forget('weekly_top_news');
        Cache::forget('trending_posts');
    }

    public function updated(Post $post)
    {
        Cache::forget('posts');
        Cache::forget('latest_news');
        Cache::forget('weekly_top_news');
        Cache::forget('trending_posts');
    }

    public function deleted(Post $post)
    {
        Cache::forget('posts');
        Cache::forget('latest_news');
        Cache::forget('weekly_top_news');
        Cache::forget('trending_posts');
    }
}
