<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Services\DynamicUrl\Contracts\DynamicUrlControllerInterface;
use App\Services\DynamicUrl\Helpers\DynamicUrlHelper;

class GosInstansController extends Controller implements DynamicUrlControllerInterface
{
    public function show(DynamicUrlHelper $validator)
    {
        $category = Category::where('link', $validator->getCategory())->first();

        return view('pages.instation', [
            'breadcrumbs' => $validator->getBreadcrumbs(),
            'category' => $category
        ]);
    }
}
