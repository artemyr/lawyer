<?php

namespace App\Services\DynamicUrl;

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Cache;

class UrlValidator
{
    public static function validate($page) {
        if (!Cache::has('cityRouteList'))
            Cache::put('cityRouteList', ["moskow", "piter", "a"], 60);

        $cities = Cache::get('cityRouteList');

        return [HomeController::class, 'index'];
    }
}
