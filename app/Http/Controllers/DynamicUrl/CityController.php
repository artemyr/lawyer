<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;

class CityController extends Controller implements DynamicUrlInterface
{
    public function show () {
        return 'CityController';
    }
}
