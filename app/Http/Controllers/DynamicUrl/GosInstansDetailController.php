<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Models\Instation;
use App\Services\DynamicUrl\UrlValidator;

class GosInstansDetailController extends Controller implements DynamicUrlInterface
{
    public function show(UrlValidator $validator)
    {
        $instation = Instation::where('link', $validator->getGosInstanse())->first();

        return view('pages.instationDetail', [
            'breadcrumbs' => $validator->getBreadcrumbs(),
            'instation' => $instation
        ]);
    }
}
