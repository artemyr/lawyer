<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Services\DynamicUrl\UrlValidator;

class DynamicUrlController extends Controller
{
    public function execute($page) {
        try {
            $validator = new UrlValidator($page);
            $class = $validator->validate();
            return $class->show();
        } catch (\Exception $e) {
            abort(404);
        }
    }
}
