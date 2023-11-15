<?php

namespace App\Http\Controllers;

use App\Services\DynamicUrl\UrlValidator;
use Illuminate\Http\Request;

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
