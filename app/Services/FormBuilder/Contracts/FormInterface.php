<?php

namespace App\Services\FormBuilder\Contracts;

use App\Services\FormBuilder\Model\GroupField;

interface FormInterface
{
    /**
     * @return GroupField[]
     */
    public function toArray(): array;
}
