<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Services\DynamicUrl\UrlValidator;

class CategoryController extends Controller implements DynamicUrlInterface
{
    public function show(UrlValidator $validator)
    {
        $category = Category::where('link', $validator->getCategory())->first();
        $city = City::where('link', $validator->getCity())->first();

        return view('pages.category', [
            'category' => $category,
            'city' => $city,
            'breadcrumbs' => $validator->getBreadcrumbs(),
            'banner' => asset('image/bg.jpg'),
            'banner_title' => "Юридические<br>услуги <span>" . $category->name . "</span>"
        ]);
    }
}
