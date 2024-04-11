<?php

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;

class SeoTags extends Component
{
    /**
     * Membuat instance komponen baru.
     */
    public function __construct()
    {
        //
    }

    /**
     * Mendapatkan tampilan / konten yang mewakili komponen.
     */
    public function render(): View|Closure|string
    {
        $settings = Cache::remember('settings', now()->addMinutes(10), function () {
            return Setting::select('title', 'description', 'logo', 'contact', 'whatsapp')->first();
        });

        return view(
            'components.seo-tags',
            compact('settings')
        );
    }
}
