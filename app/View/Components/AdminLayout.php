<?php

namespace App\View\Components;

use App\Models\Setting;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Cache;

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
        $brand = Cache::remember('settings', now()->addMinutes(10), function () {
            return Setting::select('title', 'description', 'logo', 'contact', 'whatsapp')->first();
        });

        return view('components.admin-layout', compact('brand'));
    }
}
