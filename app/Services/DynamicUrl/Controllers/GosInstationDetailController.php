<?php

namespace App\Services\DynamicUrl\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DTO\Page;
use App\Services\DynamicUrl\Contracts\DynamicUrlControllerInterface;
use App\Services\DynamicUrl\Helpers\DynamicUrlHelper;

class GosInstationDetailController extends Controller implements DynamicUrlControllerInterface
{
    public function show(DynamicUrlHelper $dynamicUrlHelper)
    {
        $city = $dynamicUrlHelper->getCity();
        $instationType = $dynamicUrlHelper->getGosInstanseType();
        $instation = $dynamicUrlHelper->getGosInstation();

        return view('pages.instationDetail', [
            'page' => new Page(
                browserTitle: "{$instationType->name} {$city->name}",
                pageTitle: $instation->name,
                headerClass: ''
            ),
            'breadcrumbs' => $dynamicUrlHelper->getBreadcrumbs(),
            'instation' => $instation
        ]);
    }
}
