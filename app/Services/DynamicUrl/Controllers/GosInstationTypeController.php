<?php

namespace App\Services\DynamicUrl\Controllers;

use App\Http\Controllers\Controller;
use App\Models\DTO\Page;
use App\Services\DynamicUrl\Contracts\DynamicUrlControllerInterface;
use App\Services\DynamicUrl\Helpers\DynamicUrlHelper;
use App\Services\DynamicUrl\Helpers\DynamicUrlHelperAbstract;

class GosInstationTypeController extends Controller implements DynamicUrlControllerInterface
{
    public function show(DynamicUrlHelper $dynamicUrlHelper)
    {
        $city = $dynamicUrlHelper->getCity();
        $instationType = $dynamicUrlHelper->getGosInstanse();

        return view('pages.instation', [
            'page' => new Page(
                browserTitle: "{$instationType->name} {$city->name}",
                pageTitle: "{$instationType->name} {$city->name}",
                headerClass: ''
            ),
            'breadcrumbs' => $dynamicUrlHelper->getBreadcrumbs(),
            'instations' => $instationType->instations,

            'citySlug' => $city->link,
            'instationSlug' => DynamicUrlHelperAbstract::INSTATIONS_SLUG,
            'instationTypeSlug' => $instationType->link
        ]);
    }
}
