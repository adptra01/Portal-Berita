<?php

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class AdminLayout extends Component
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
        $cacheKey = 'admin_nav_brand';

        $brand = Cache::remember($cacheKey, 60, function () {
            // Cache for 1 hour
            return Setting::select('logo', 'icon', 'title')->first();
        });

        return view('components.admin-layout', compact('brand'));
    }
}
