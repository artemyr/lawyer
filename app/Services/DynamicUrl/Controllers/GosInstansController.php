<?php

namespace App\Services\DynamicUrl\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\DynamicUrl\Contracts\DynamicUrlControllerInterface;
use App\Services\DynamicUrl\Helpers\DynamicUrlHelper;

class GosInstansController extends Controller implements DynamicUrlControllerInterface
{
    public function show(DynamicUrlHelper $dynamicUrlHelper)
    {
        $category = Category::where('link', $dynamicUrlHelper->getCategory())->first();

        return view('pages.instation', [
            'breadcrumbs' => $dynamicUrlHelper->getBreadcrumbs(),
            'category' => $category
        ]);
    }
}
