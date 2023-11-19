<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Services\DynamicUrl\UrlValidator;

class DefaultController extends Controller implements DynamicUrlInterface
{
    public function show(UrlValidator $validator)
    {
        abort(404);
    }
}
