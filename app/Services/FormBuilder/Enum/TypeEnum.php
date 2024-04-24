<?php

namespace App\Services\FormBuilder\Enum;

use App\Services\FormBuilder\Contracts\FormInterface;
use App\Services\FormBuilder\Forms\CategoryForm;
use App\Services\FormBuilder\Forms\CityForm;
use App\Services\FormBuilder\Forms\InstationForm;
use App\Services\FormBuilder\Forms\InstationTypeForm;

enum TypeEnum: string
{
    case CITY = 'city';
    case CATEGORY = 'category';
    case INSTATION = 'instation';
    case INSTATION_TYPE = 'instation-type';

    public function getForm($model): FormInterface
    {
        return match ($this) {
            self::CITY => new CityForm($model),
            self::CATEGORY => new CategoryForm($model),
            self::INSTATION => new InstationForm($model),
            self::INSTATION_TYPE => new InstationTypeForm($model),
        };
    }
}
