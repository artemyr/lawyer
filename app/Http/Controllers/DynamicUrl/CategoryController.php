<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Services\DynamicUrl\UrlValidator;

class CategoryController extends Controller implements DynamicUrlInterface
{
    public function show(UrlValidator $validator)
    {
        return view('category', [
            'category' => $validator->getCategory(),
            'breadcrumbs' => $validator->getBreadcrumbs()
        ]);
    }
}
