<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;

class DefaultController extends Controller implements DynamicUrlInterface
{
    public function show()
    {
        return 'DefaultController';
    }
}
