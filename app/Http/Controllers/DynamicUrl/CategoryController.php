<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\City;
use App\Models\DTO\Banner;
use App\Services\DynamicUrl\UrlValidator;

class CategoryController extends Controller implements DynamicUrlInterface
{
    public function show(UrlValidator $validator)
    {
        $category = Category::where('link', $validator->getCategory())->first();

        return view('pages.category', [
            'category' => $category,
            'breadcrumbs' => $validator->getBreadcrumbs(),
            'banner' => new Banner(
                bigImage: asset('image/bg.jpg'),
                averageImage: asset('image/bg.png'),
                smallImage: asset('image/bg-small.png'),
                title: "Юридические<br>услуги <span> " . $category->name . "</span>"
            ),
        ]);
    }
}
