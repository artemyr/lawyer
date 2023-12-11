<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\DynamicUrl\UrlValidator;

class GosInstansController extends Controller implements DynamicUrlInterface
{
    public function show(UrlValidator $validator)
    {
        $category = Category::where('link', $validator->getCategory())->first();

        return view('pages.instation', [
            'breadcrumbs' => $validator->getBreadcrumbs(),
            'category' => $category
        ]);
    }
}
