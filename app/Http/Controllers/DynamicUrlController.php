<?php

namespace App\Http\Controllers;

use App\Services\DynamicUrl\UrlValidator;
use Illuminate\Http\Request;

class DynamicUrlController extends Controller
{
    public function execute($page) {
        [$class, $method] = UrlValidator::validate($page);
        return $class->{$method}();
    }
}
