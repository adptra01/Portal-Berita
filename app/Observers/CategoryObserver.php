<?php

namespace App\Observers;

use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class CategoryObserver
{

    public function created(Category $category)
    {
        Cache::forget('categories');
    }

    public function updated(Category $category)
    {
        Cache::forget('categories');
    }

    public function deleted(Category $category)
    {
        Cache::forget('categories');
    }
}
