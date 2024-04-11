<?php

namespace App\Observers;

use App\Models\Advert;
use Illuminate\Support\Facades\Cache;

class AdvertObserver
{
    public function created(Advert $advert)
    {
        Cache::forget('adverts');
        Cache::forget('bottomAdverts');
        Cache::forget('popAdverts');
        Cache::forget('sideAdverts');
        Cache::forget('topAdverts');
    }

    public function updated(Advert $advert)
    {
        Cache::forget('adverts');
        Cache::forget('bottomAdverts');
        Cache::forget('popAdverts');
        Cache::forget('sideAdverts');
        Cache::forget('topAdverts');
    }

    public function deleted(Advert $advert)
    {
        Cache::forget('adverts');
        Cache::forget('bottomAdverts');
        Cache::forget('popAdverts');
        Cache::forget('sideAdverts');
        Cache::forget('topAdverts');
    }
}
