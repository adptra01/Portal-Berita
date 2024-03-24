<?php

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\Component;

class SeoTags extends Component
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
        $cacheKey = 'seo_tags';  // Define a cache key

        $settings = Cache::remember($cacheKey, 60, function () {
            return Setting::select('title', 'icon', 'logo', 'description')->first();
        });

        return view(
            'components.seo-tags',
            compact('settings')
        );
    }
}
