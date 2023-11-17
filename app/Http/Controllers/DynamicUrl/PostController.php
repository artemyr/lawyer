<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;

class PostController extends Controller implements DynamicUrlInterface
{
    public function show() {
        return 'PostController';
    }
}
