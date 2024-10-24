<?php

namespace App\Services\DynamicUrl\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\DTO\Banner;
use App\Models\DTO\Page;
use App\Services\DynamicUrl\Contracts\DynamicUrlControllerInterface;
use App\Services\DynamicUrl\Helpers\DynamicUrlHelper;

class CategoryController extends Controller implements DynamicUrlControllerInterface
{
    public function show(DynamicUrlHelper $dynamicUrlHelper)
    {
        $category =  $dynamicUrlHelper->getCategory();
        $city = $dynamicUrlHelper->getCity();
        $instationTypes = [];

        if ($city) {
            $browserTitle = $category->name . ' в ' . $city->name_d;
            $dynamicBlock = 'instance';
            $instationTypes = $city->instations();
        } else {
            $browserTitle = $category->name;
            $dynamicBlock = 'cities';
        }

        return view('pages.category', [
            'page' => new Page(
                browserTitle: $browserTitle,
                pageTitle: '',
                headerClass: 'mobile-banner'
            ),
            'category' => $category,
            'banner' => new Banner(
                bigImage: asset('image/bg.jpg'),
                averageImage: asset('image/bg.png'),
                smallImage: asset('image/bg-small.png'),
                title: "Юридические<br>услуги <span> " . $category->name . "</span>"
            ),
            'dynamicBlock' => $dynamicBlock,
            'instationTypes' => $instationTypes
        ]);
    }
}
