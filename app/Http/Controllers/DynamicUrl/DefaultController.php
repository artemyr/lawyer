<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Services\DynamicUrl\Contracts\DynamicUrlControllerInterface;
use App\Services\DynamicUrl\Helpers\DynamicUrlHelper;

class DefaultController extends Controller implements DynamicUrlControllerInterface
{
    public function show(DynamicUrlHelper $validator)
    {
        abort(404);
    }
}
