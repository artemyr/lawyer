<?php

namespace App\Services\FormBuilder\Forms;

use App\Models\City;
use App\Services\FormBuilder\Enum\FieldTypeEnum;
use App\Services\FormBuilder\Enum\GroupFieldTypeEnum;
use App\Services\FormBuilder\FieldBuilder;
use App\Services\FormBuilder\FormBuilder;
use App\Services\FormBuilder\GroupFieldBuilder;
use App\Services\FormBuilder\Model\GroupField;

class CityForm extends AbstractForm
{
    private ?City $city;

    public function __construct(City $city)
    {
        if ($city->id) {
            $this->city = $city;
        }

        $this->groupFields = FormBuilder::createInstance()
            ->addGroupField($this->getNameLink())
            ->addGroupField(
                GroupFieldBuilder::createInstance()
                    ->configureType(GroupFieldTypeEnum::EDIT_TEXT)
                    ->addField(
                        FieldBuilder::createInstance()
                            ->configureType(FieldTypeEnum::TEXT)
                            ->configureCode('text')
                            ->configureName('TEXT')
                            ->configureLabel('Город в дательном пажеже')
                            ->configurePlaceholder('Москве')
                            ->create()
                    )
                    ->create()
            )
            ->getGroupFields();
    }

    private function getNameLink(): GroupField
    {
        $name = '';
        $link = '';

        if (!empty($this->city)) {
            $name = $this->city->name;
            $link = $this->city->link;
        }

        return GroupFieldBuilder::createInstance()
            ->configureType(GroupFieldTypeEnum::NAME_LINK)
            ->addField(
                FieldBuilder::createInstance()
                    ->configureCode('name')
                    ->configureType(FieldTypeEnum::TEXT)
                    ->configureName('name')
                    ->configureLabel('Город')
                    ->configurePlaceholder('Введите город')
                    ->configureCaption('(Краснодар, Москва, ...)')
                    ->configureValue($name)
                    ->create()
            )
            ->addField(
                FieldBuilder::createInstance()
                    ->configureCode('link')
                    ->configureType(FieldTypeEnum::TEXT)
                    ->configureName('link')
                    ->configureLabel('Ссылка')
                    ->configurePlaceholder('link')
                    ->configureCaption('Человеко понятный url')
                    ->configureValue($link)
                    ->create()
            )
            ->create();
    }
}
