<?php

namespace App\Services\FormBuilder\Forms;

use App\Models\Category;
use App\Models\City;
use App\Models\Icon;
use App\Models\Instation;
use App\Models\InstationType;
use App\Services\FormBuilder\Enum\FieldTypeEnum;
use App\Services\FormBuilder\Enum\GroupFieldTypeEnum;
use App\Services\FormBuilder\FieldBuilder;
use App\Services\FormBuilder\FormBuilder;
use App\Services\FormBuilder\GroupFieldBuilder;
use App\Services\FormBuilder\Model\GroupField;
use App\Services\FormBuilder\Model\Value;

class InstationForm extends AbstractForm
{
    private ?Instation $instation;

    public function __construct(Instation $instation)
    {
        if ($instation->id) {
            $this->instation = $instation;
        }

        $active = false;
        if (!empty($this->instation->active)) {
            $active = (bool)$this->instation->active;
        }

        $sort = 500;
        if (!empty($this->instation->sort)) {
            $sort = $this->instation->sort;
        }

        $props = [];
        if (!empty($this->instation->props)) {
            $props = $this->instation->props->toArray();
        }

        $this->groupFields = FormBuilder::createInstance()
            ->addGroupField(
                GroupFieldBuilder::createInstance()
                    ->configureType(GroupFieldTypeEnum::CHECKBOX)
                    ->addField(
                        FieldBuilder::createInstance()
                            ->configureType(FieldTypeEnum::CHECKBOX)
                            ->configureCode('checkbox')
                            ->configureName('active')
                            ->configureLabel('Активность')
                            ->configureValue($active)
                            ->create()
                    )
                    ->create()
            )
            ->addGroupField(
                GroupFieldBuilder::createInstance()
                    ->configureType(GroupFieldTypeEnum::NUMBER)
                    ->addField(
                        FieldBuilder::createInstance()
                            ->configureType(FieldTypeEnum::NUMBER)
                            ->configureCode('number')
                            ->configureName('sort')
                            ->configureLabel('Сортировка')
                            ->configureValue($sort)
                            ->create()
                    )
                    ->create()
            )
            ->addGroupField($this->getNameLinkField())
            ->addGroupField($this->getInstationTypeField())
            ->addGroupField($this->getCityField())
            ->addGroupField($this->getIconField())
            ->addGroupField(
                GroupFieldBuilder::createInstance()
                    ->configureType(GroupFieldTypeEnum::TEXT)
                    ->addField(
                        FieldBuilder::createInstance()
                            ->configureType(FieldTypeEnum::TEXT)
                            ->configureCode('text')
                            ->configureName('district')
                            ->configureLabel('Район')
                            ->configureValue($instation->district)
                            ->create()
                    )
                    ->create()
            )
            ->addGroupField(
                GroupFieldBuilder::createInstance()
                    ->configureType(GroupFieldTypeEnum::TEXT)
                    ->addField(
                        FieldBuilder::createInstance()
                            ->configureType(FieldTypeEnum::TEXT)
                            ->configureCode('text')
                            ->configureName('address')
                            ->configureLabel('Адрес')
                            ->configureValue($instation->address)
                            ->create()
                    )
                    ->create()
            )
            ->addGroupField(
                GroupFieldBuilder::createInstance()
                    ->configureType(GroupFieldTypeEnum::TEXT)
                    ->addField(
                        FieldBuilder::createInstance()
                            ->configureType(FieldTypeEnum::TEXT)
                            ->configureCode('text')
                            ->configureName('telephone')
                            ->configureLabel('Телефон')
                            ->configureValue($instation->telephone)
                            ->create()
                    )
                    ->create()
            )
            ->addGroupField(
                GroupFieldBuilder::createInstance()
                    ->configureType(GroupFieldTypeEnum::TEXT)
                    ->addField(
                        FieldBuilder::createInstance()
                            ->configureType(FieldTypeEnum::TEXT)
                            ->configureCode('text')
                            ->configureName('opening_hours')
                            ->configureLabel('Режим работы')
                            ->configureValue($instation->opening_hours)
                            ->create()
                    )
                    ->create()
            )
            ->addGroupField(
                GroupFieldBuilder::createInstance()
                    ->configureType(GroupFieldTypeEnum::TEXT_MULTI)
                    ->addField(
                        FieldBuilder::createInstance()
                            ->configureType(FieldTypeEnum::TEXT)
                            ->configureCode('text')
                            ->configureName('props')
                            ->configureLabel('Дополнительные свойства')
                            ->configureValue($props)
                            ->create()
                    )
                    ->create()
            )
            ->getGroupFields();
    }

    private function getNameLinkField(): GroupField
    {
        $name = '';
        $link = '';

        if (!empty($this->instation)) {
            $name = $this->instation->name;
            $link = $this->instation->link;
        }

        return GroupFieldBuilder::createInstance()
            ->configureType(GroupFieldTypeEnum::NAME_LINK)
            ->addField(
                FieldBuilder::createInstance()
                    ->configureCode('name')
                    ->configureType(FieldTypeEnum::TEXT)
                    ->configureName('name')
                    ->configureLabel('Категория')
                    ->configurePlaceholder('Введите категорию')
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

    private function getIconField(): GroupField
    {
        $icons = [
            new Value(0,'','Без иконки'),
        ];

        foreach (Icon::all() as $icon) {
            $icons[] = new Value($icon->id, $icon->code, $icon->code);
        }

        $icon = null;
        if (!empty($this->instation->icon->id)){
            $icon = new Value(
                $this->instation->icon->id,
                $this->instation->icon->code,
                $this->instation->icon->code,
            );
        }

        return GroupFieldBuilder::createInstance()
            ->configureType(GroupFieldTypeEnum::ICON_SELECT)
            ->addField(
                FieldBuilder::createInstance()
                    ->configureCode('select')
                    ->configureType(FieldTypeEnum::SELECT)
                    ->configureName('icon_id')
                    ->configureLabel('Иконка')
                    ->configureValues($icons)
                    ->configureValue($icon)
                    ->create()
            )
            ->create();
    }

    private function getInstationTypeField(): GroupField
    {
        $instationTypes = [
            new Value(0,'','Не выбран')
        ];

        foreach (InstationType::all() as $city) {
            $instationTypes[] = new Value($city->id, $city->link, $city->name);
        }

        $instationType = null;
        if (!empty($this->instation->instationType->id)) {
            $instationType = $this->instation->instationType->id;
        }

        return GroupFieldBuilder::createInstance()
            ->configureType(GroupFieldTypeEnum::SELECT)
            ->addField(
                FieldBuilder::createInstance()
                    ->configureType(FieldTypeEnum::SELECT)
                    ->configureCode('select')
                    ->configureName('instation_type_id')
                    ->configureLabel('Тип инстанции')
                    ->configureValues($instationTypes)
                    ->configureValue($instationType)
                    ->create()
            )
            ->create();
    }

    private function getCityField(): GroupField
    {
        $cities = [
            new Value(0,'','Не выбран')
        ];

        foreach (City::all() as $city) {
            $cities[] = new Value($city->id, $city->link, $city->name);
        }

        $citiesIds = null;
        if (!empty($this->instation)) {
            $instationTypeCities = $this->instation->cities()->get();
            if (!empty($instationTypeCities)) {
                $citiesIds = $instationTypeCities->pluck('id');
            }
        }

        return GroupFieldBuilder::createInstance()
            ->configureType(GroupFieldTypeEnum::MULTI_SELECT_SEARCH)
            ->addField(
                FieldBuilder::createInstance()
                    ->configureCode('select')
                    ->configureType(FieldTypeEnum::SELECT)
                    ->configureName('city_id')
                    ->configureLabel('Город')
                    ->configureValues($cities)
                    ->configureValue($citiesIds)
                    ->create()
            )
            ->create();
    }
}
