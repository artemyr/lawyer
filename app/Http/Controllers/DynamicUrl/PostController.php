<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Http\Controllers\Controller;
use App\Services\DynamicUrl\UrlValidator;

class PostController extends Controller implements DynamicUrlInterface
{
    public function show(UrlValidator $validator) {
        return view('post', [
            'breadcrumbs' => $validator->getBreadcrumbs(),
            'post' => $validator->getPost()
        ]);
    }
}
