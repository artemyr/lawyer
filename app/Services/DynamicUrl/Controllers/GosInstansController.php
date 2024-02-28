<?php

namespace App\Services\DynamicUrl\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DTO\Page;
use App\Services\DynamicUrl\Contracts\DynamicUrlControllerInterface;
use App\Services\DynamicUrl\Helpers\DynamicUrlHelper;

class GosInstansController extends Controller implements DynamicUrlControllerInterface
{
    public function show(DynamicUrlHelper $dynamicUrlHelper)
    {
        $city = $dynamicUrlHelper->getCity();
        $instance = $dynamicUrlHelper->getGosInstanse();

        return view('pages.instation', [
            'page' => new Page(
                browserTitle: "{$instance->name} {$city->name}",
                pageTitle: "{$instance->name} {$city->name}",
                headerClass: ''
            ),
            'breadcrumbs' => $dynamicUrlHelper->getBreadcrumbs(),
        ]);
    }
}
