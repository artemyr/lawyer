<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\DTO\Banner;
use App\Services\DynamicUrl\Contracts\DynamicUrlControllerInterface;
use App\Services\DynamicUrl\Helpers\DynamicUrlHelper;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;

class CityController extends Controller implements DynamicUrlControllerInterface
{
    public function show (DynamicUrlHelper $validator)
    {
        $city = City::where('link', $validator->getCity())->first();

        return view('pages.category', [
            'city' => $city,
            'banner' => new Banner(
                bigImage: asset('image/bg.jpg'),
                averageImage: asset('image/bg.png'),
                smallImage: asset('image/bg-small.png'),
                title: "Юридические<br>услуги <span>в " . $city->name . "</span>"
            ),
        ]);
    }
}
