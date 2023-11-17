<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Services\DynamicUrl\UrlValidator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class CityController extends Controller implements DynamicUrlInterface
{
    public function show (UrlValidator $validator) {
        if (!Cache::has('categoryRouteList'))
            Cache::put('categoryRouteList', ["autojurist", "bankrotstvo", "kredity"], 60);
        if (!Cache::has('instansRouteList'))
            Cache::put('instansRouteList', ["gibdd", "prokuratura", "sudy"], 60);
        return view('city', [
            'categories' => Cache::get('categoryRouteList'),
            'instans' => Cache::get('instansRouteList'),
            'city' => $validator->getCity()
        ]);
    }
}
