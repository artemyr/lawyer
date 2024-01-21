<?php

namespace App\Services\DynamicUrl\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Instation;
use App\Services\DynamicUrl\Contracts\DynamicUrlControllerInterface;
use App\Services\DynamicUrl\Helpers\DynamicUrlHelper;

class GosInstansDetailController extends Controller implements DynamicUrlControllerInterface
{
    public function show(DynamicUrlHelper $dynamicUrlHelper)
    {
        $instation = Instation::where('link', $dynamicUrlHelper->getGosInstanse())->first();

        return view('pages.instationDetail', [
            'breadcrumbs' => $dynamicUrlHelper->getBreadcrumbs(),
            'instation' => $instation
        ]);
    }
}
