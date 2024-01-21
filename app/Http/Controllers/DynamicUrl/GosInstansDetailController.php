<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Models\Instation;
use App\Services\DynamicUrl\Contracts\DynamicUrlControllerInterface;
use App\Services\DynamicUrl\Helpers\DynamicUrlHelper;

class GosInstansDetailController extends Controller implements DynamicUrlControllerInterface
{
    public function show(DynamicUrlHelper $validator)
    {
        $instation = Instation::where('link', $validator->getGosInstanse())->first();

        return view('pages.instationDetail', [
            'breadcrumbs' => $validator->getBreadcrumbs(),
            'instation' => $instation
        ]);
    }
}
