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
        $name_d = '';
        $coords = '';

        if ($city->id) {
            $this->city = $city;

            $name_d = $this->city->name_d;
            $coords = $this->city->coords;
        }

        $this->groupFields = FormBuilder::createInstance()
            ->addGroupField($this->getNameLink())
            ->addGroupField(
                GroupFieldBuilder::createInstance()
                    ->configureType(GroupFieldTypeEnum::TEXT)
                    ->addField(
                        FieldBuilder::createInstance()
                            ->configureType(FieldTypeEnum::TEXT)
                            ->configureCode('text')
                            ->configureName('name_d')
                            ->configureLabel('Город в предложном пажеже')
                            ->configurePlaceholder('Москве')
                            ->configureValue($name_d)
                            ->create()
                    )
                    ->create()
            )
            ->addGroupField(
                GroupFieldBuilder::createInstance()
                    ->configureType(GroupFieldTypeEnum::COORDS)
                    ->addField(
                        FieldBuilder::createInstance()
                            ->configureType(FieldTypeEnum::NUMBER)
                            ->configureCode('lat')
                            ->configureName('lat')
                            ->configureLabel('Широта')
                            ->configurePlaceholder('39.337618')
                            ->configureValue($coords->lat)
                            ->create()
                    )
                    ->addField(
                        FieldBuilder::createInstance()
                            ->configureType(FieldTypeEnum::NUMBER)
                            ->configureCode('lon')
                            ->configureName('lon')
                            ->configureLabel('Долгота')
                            ->configurePlaceholder('44.876829')
                            ->configureValue($coords->lon)
                            ->create()
                    )
                    ->addField(
                        FieldBuilder::createInstance()
                            ->configureType(FieldTypeEnum::NUMBER)
                            ->configureCode('zoom')
                            ->configureName('zoom')
                            ->configureLabel('Зум')
                            ->configurePlaceholder('12')
                            ->configureValue($coords->zoom)
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
