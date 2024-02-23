<?php

namespace App\Services\FormBuilder\Forms;

use App\Models\Category;
use App\Models\City;
use App\Models\Icon;
use App\Services\FormBuilder\Enum\FieldTypeEnum;
use App\Services\FormBuilder\Enum\GroupFieldTypeEnum;
use App\Services\FormBuilder\FieldBuilder;
use App\Services\FormBuilder\FormBuilder;
use App\Services\FormBuilder\GroupFieldBuilder;
use App\Services\FormBuilder\Model\GroupField;
use App\Services\FormBuilder\Model\Value;

class CategoryForm extends AbstractForm
{
    private ?Category $category;

    public function __construct(Category $category)
    {
        if ($category->id) {
            $this->category = $category;
        }

        $active = false;
        if (!empty($this->category->active)) {
            $active = (bool)$this->category->active;
        }

        $sort = 500;
        if (!empty($this->category->sort)) {
            $sort = $this->category->sort;
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
            ->addGroupField($this->getIconField())
            ->addGroupField($this->getCityField())
            ->getGroupFields();
    }

    private function getNameLinkField(): GroupField
    {
        $name = '';
        $link = '';

        if (!empty($this->category)) {
            $name = $this->category->name;
            $link = $this->category->link;
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
        $icons = [];

        foreach (Icon::all() as $icon) {
            $icons[] = new Value($icon->id, $icon->code, $icon->code);
        }

        $iconId = null;
        if (!empty($this->category->icon->id)){
            $iconId = $this->category->icon->id;
        }

        return GroupFieldBuilder::createInstance()
            ->configureType(GroupFieldTypeEnum::SELECT)
            ->addField(
                FieldBuilder::createInstance()
                    ->configureCode('select')
                    ->configureType(FieldTypeEnum::SELECT)
                    ->configureName('icon_id')
                    ->configureLabel('Иконка')
                    ->configureValues($icons)
                    ->configureValue($iconId)
                    ->create()
            )
            ->create();
    }

    private function getCityField(): GroupField
    {
        $cities = [];

        foreach (City::all() as $city) {
            $cities[] = new Value($city->id, $city->link, $city->name);
        }

        $cityId = null;
        if (!empty($this->category->city->id)) {
            $cityId = $this->category->city->id;
        }

        return GroupFieldBuilder::createInstance()
            ->configureType(GroupFieldTypeEnum::SELECT_SEARCH)
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
