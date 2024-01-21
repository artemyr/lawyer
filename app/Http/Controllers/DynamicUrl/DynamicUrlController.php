<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Services\DynamicUrl\Helpers\DynamicUrlHelper;
use Exception;

class DynamicUrlController extends Controller
{
    public function execute($page)
    {
        try {
            $validator = new DynamicUrlHelper($page);
            $class = $validator->getHandlerClass();
            return $class->show($validator);
        } catch (Exception) {
            abort(404);
        }
    }
}
