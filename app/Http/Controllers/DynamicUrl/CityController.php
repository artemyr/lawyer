<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Services\DynamicUrl\UrlValidator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class CityController extends Controller implements DynamicUrlInterface
{
    public function show (UrlValidator $validator) {
        return view('pages.category', [
            'city' => $validator->getCity(),
            'breadcrumbs' => $validator->getBreadcrumbs()
        ]);
    }
}
