<?php

namespace App\Services\FormBuilder\Forms;

use App\Models\City;
use App\Models\Icon;
use App\Models\InstationType;
use App\Services\FormBuilder\Enum\FieldTypeEnum;
use App\Services\FormBuilder\Enum\GroupFieldTypeEnum;
use App\Services\FormBuilder\FieldBuilder;
use App\Services\FormBuilder\FormBuilder;
use App\Services\FormBuilder\GroupFieldBuilder;
use App\Services\FormBuilder\Model\GroupField;
use App\Services\FormBuilder\Model\Value;

class InstationTypeForm extends AbstractForm
{
    private ?InstationType $instationType;

    public function __construct(InstationType $instationType)
    {
        if ($instationType->id) {
            $this->instationType = $instationType;
        }

        $active = false;
        if (!empty($this->instationType->active)) {
            $active = (bool)$this->instationType->active;
        }

        $sort = 500;
        if (!empty($this->instationType->sort)) {
            $sort = $this->instationType->sort;
        }

        $this->groupFields = FormBuilder::createInstance()
            ->addGroupField($this->getNameLinkField())
            ->addGroupField($this->getIconField())
            ->addGroupField($this->getCityField())
            ->getGroupFields();
    }

    private function getNameLinkField(): GroupField
    {
        $name = '';
        $link = '';

        if (!empty($this->instationType)) {
            $name = $this->instationType->name;
            $link = $this->instationType->link;
        }

        return GroupFieldBuilder::createInstance()
            ->configureType(GroupFieldTypeEnum::NAME_LINK)
            ->addField(
                FieldBuilder::createInstance()
                    ->configureCode('name')
                    ->configureType(FieldTypeEnum::TEXT)
                    ->configureName('name')
                    ->configureLabel('Название')
                    ->configurePlaceholder('Введите название')
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
        if (!empty($this->instationType->icon->id)){
            $icon = new Value(
                $this->instationType->icon->id,
                $this->instationType->icon->code,
                $this->instationType->icon->code,
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

    private function getCityField(): GroupField
    {
        $cities = [
            new Value(0,'','Не выбран')
        ];

        foreach (City::all() as $city) {
            $cities[] = new Value($city->id, $city->link, $city->name);
        }

        $cityId = null;
        if (!empty($this->instationType->city->id)) {
            $cityId = $this->instationType->city->id;
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
                    ->configureValue($cityId)
                    ->create()
            )
            ->create();
    }
}
