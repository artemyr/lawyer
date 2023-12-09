<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Services\DynamicUrl\UrlValidator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class CityController extends Controller implements DynamicUrlInterface
{
    public function show (UrlValidator $validator) {
        $city = City::where('link', $validator->getCity())->first();

        return view('pages.category', [
            'city' => $city,
            'breadcrumbs' => $validator->getBreadcrumbs(),
            'banner' => asset('image/bg.jpg'),
            'banner_title' => "Юридические<br>услуги <span>в " . $city->name . "</span>"
        ]);
    }
}
