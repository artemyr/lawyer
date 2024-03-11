<?php

namespace App\Services\FormBuilder\Enum;

use App\Services\FormBuilder\Contracts\FormInterface;
use App\Services\FormBuilder\Forms\CategoryForm;
use App\Services\FormBuilder\Forms\CityForm;
use App\Services\FormBuilder\Forms\InstationForm;

enum TypeEnum: string
{
    case CITY = 'city';
    case CATEGORY = 'category';
    case INSTATION = 'instation';

    public function getForm($model): FormInterface
    {
        return match ($this) {
            self::CITY => new CityForm($model),
            self::CATEGORY => new CategoryForm($model),
            self::INSTATION => new InstationForm($model),
        };
    }
}
