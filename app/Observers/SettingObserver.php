<?php

namespace App\Observers;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingObserver
{
    public function created(Setting $setting)
    {
        Cache::forget('settings');
        Cache::forget('settings_admin_panel');
        Cache::forget('brand_partial');
        Cache::forget('settingPages');
    }

    public function updated(Setting $setting)
    {
        Cache::forget('settings');
        Cache::forget('settings_admin_panel');
        Cache::forget('brand_partial');
        Cache::forget('settingPages');
    }

    public function deleted(Setting $setting)
    {
        Cache::forget('settings');
        Cache::forget('settings_admin_panel');
        Cache::forget('brand_partial');
        Cache::forget('settingPages');
    }
}
