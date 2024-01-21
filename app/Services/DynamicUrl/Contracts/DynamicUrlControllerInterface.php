<?php

namespace App\Services\DynamicUrl\Contracts;

use App\Services\DynamicUrl\Helpers\DynamicUrlHelper;

interface DynamicUrlControllerInterface
{
    public function show(DynamicUrlHelper $validator);
}
