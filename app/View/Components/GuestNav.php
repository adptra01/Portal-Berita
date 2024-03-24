<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class GuestNav extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $cacheKey = 'guest_nav_categories';

        $categories = Cache::remember($cacheKey, 60, function () {
            // Cache for 1 hour
            return Category::get();
        });

        return view('components.guest-nav', compact('categories'));
    }
}
