<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Services\DynamicUrl\UrlValidator;
use Illuminate\Support\Facades\Cache;

class GosInstansController extends Controller implements DynamicUrlInterface
{
    public function show(UrlValidator $validator)
    {
        return view('pages.instation', [
            'breadcrumbs' => $validator->getBreadcrumbs(),
            'posts' => Cache::get('postsRouteList'),
            'instance' => $validator->getGosInstanse()
        ]);
    }
}
