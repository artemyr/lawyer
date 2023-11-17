<?php

namespace App\Http\Controllers\DynamicUrl;

use App\Services\DynamicUrl\UrlValidator;

interface DynamicUrlInterface
{
    public function show(UrlValidator $validator);
}
