<?php

namespace App\Services\DynamicUrl\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DTO\Banner;
use App\Models\DTO\Page;
use App\Services\DynamicUrl\Contracts\DynamicUrlControllerInterface;
use App\Services\DynamicUrl\Helpers\DynamicUrlHelper;
use App\Services\DynamicUrl\Helpers\DynamicUrlHelperAbstract;

class CityController extends Controller implements DynamicUrlControllerInterface
{
    public function show (DynamicUrlHelper $dynamicUrlHelper)
    {
        $city = $dynamicUrlHelper->getCity();
        $instationTypes = $city->instationTypes;

        return view('pages.category', [
            'page' => new Page(
                browserTitle: "Юридические услуги в " . $city->name_d,
                pageTitle: '',
                headerClass: 'mobile-banner'
            ),
            'banner' => new Banner(
                bigImage: asset('image/bg.jpg'),
                averageImage: asset('image/bg.png'),
                smallImage: asset('image/bg-small.png'),
                title: "Юридические<br>услуги <span>в " . $city->name_d . "</span>"
            ),
            'map' => $city->coords,
            'dynamicBlock' => 'instance',
            'instationTypes' => $instationTypes,

            'citySlug' => $city->link,
            'instationSlug' => DynamicUrlHelperAbstract::INSTATIONS_SLUG,
        ]);
    }
}
