<?php

namespace App\Services\FormBuilder\Forms;

use App\Services\FormBuilder\Contracts\FormInterface;
use App\Services\FormBuilder\Model\GroupField;

abstract class AbstractForm implements FormInterface
{
    /** @var GroupField[] */
    protected array $groupFields;

    public function toArray(): array
    {
        return array_map(fn($groupField) => $groupField->toArray(), $this->groupFields);
    }

    public function getNameList(): array
    {
        $res = [];

        foreach ($this->groupFields as $groupField) {
            foreach ($groupField->getFields() as $field) {
                $res[] = $field->getOriginalName();
            }
            if ($groupField->hasChilds()) {
                foreach ($groupField->getChilds() as $child) {
                    foreach ($child->getFields() as $field) {
                        $res[] = $field->getOriginalName();
                    }
                }
            }
        }

        return $res;
    }

    public function validated(array $data): array
    {
        $result = [];
        $nameList = $this->getNameList();

        foreach ($nameList as $name) {
            if (!empty($data[$name])) {
                $result[$name] = $data[$name];
            }
        }

        return $result;
    }
}
