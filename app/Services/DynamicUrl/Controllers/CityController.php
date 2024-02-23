<?php

namespace App\Services\DynamicUrl\Controllers;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\DTO\Banner;
use App\Models\DTO\Page;
use App\Services\DynamicUrl\Contracts\DynamicUrlControllerInterface;
use App\Services\DynamicUrl\Helpers\DynamicUrlHelper;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class CityController extends Controller implements DynamicUrlControllerInterface
{
    public function show (DynamicUrlHelper $dynamicUrlHelper)
    {
        $city = $dynamicUrlHelper->getCity();

        return view('pages.category', [
            'page' => new Page(
                browserTitle: $city->name,
                pageTitle: '',
                headerClass: 'mobile-banner'
            ),
            'banner' => new Banner(
                bigImage: asset('image/bg.jpg'),
                averageImage: asset('image/bg.png'),
                smallImage: asset('image/bg-small.png'),
                title: "Юридические<br>услуги <span>в " . $city->name . "</span>"
            ),
        ]);
    }
}
