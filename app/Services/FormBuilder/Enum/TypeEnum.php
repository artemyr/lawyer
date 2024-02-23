<?php

namespace App\Services\FormBuilder\Enum;

use App\Services\FormBuilder\Contracts\FormInterface;
use App\Services\FormBuilder\Forms\CategoryForm;
use App\Services\FormBuilder\Forms\CityForm;

enum TypeEnum: string
{
    case CITY = 'city';
    case CATEGORY = 'category';

    public function getForm($model): FormInterface
    {
        return match ($this) {
            self::CITY => new CityForm($model),
            self::CATEGORY => new CategoryForm($model)
        };
    }
}
