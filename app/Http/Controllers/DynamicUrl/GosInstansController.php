<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Services\DynamicUrl\UrlValidator;
use Illuminate\Support\Facades\Cache;

class GosInstansController extends Controller implements DynamicUrlInterface
{
    public function show(UrlValidator $validator)
    {
        if (!Cache::has('postsRouteList'))
            Cache::put('postsRouteList', ["detal1", "detal2", "detal3"], 60);
        return view('instans', [
            'posts' => Cache::get('postsRouteList'),
            'instance' => $validator->getGosInstanse()
        ]);
    }
}
