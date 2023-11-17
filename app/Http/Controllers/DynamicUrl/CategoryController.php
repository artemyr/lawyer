<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;

class CategoryController extends Controller implements DynamicUrlInterface
{
    public function show()
    {
        return 'CategoryController';
    }
}
