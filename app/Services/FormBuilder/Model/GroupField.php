<?php

namespace App\Services\FormBuilder\Model;

use App\Services\FormBuilder\Enum\GroupFieldTypeEnum;

class GroupField
{
    /**
     * @param GroupFieldTypeEnum $type
     * @param Field[] $fields
     * @param GroupField[] $childs
     * @param string $label
     * @param bool $multiple
     * @param bool $multipleIsRequired
     * @param string $multipleName
     */
    public function __construct(
        protected GroupFieldTypeEnum $type,
        protected array              $fields,
        protected array              $childs,
        protected string             $label,

        protected bool               $multiple,
        protected bool               $multipleIsRequired,
        protected string             $multipleName,
    )
    {
        if ($this->multiple) {
            foreach ($this->childs as $child) {
                foreach ($child->getFields() as $field) {
                    $field->setMultiple();
                }
            }
        }
    }

    public function getFields(): array
    {
        return $this->fields;
    }

    public function getChilds():array
    {
        return $this->childs;
    }

    public function hasChilds(): bool
    {
        return (count($this->childs) > 0);
    }

    public function toArray(): array
    {
        $result = [
            'type' => $this->type->value,
            'label' => $this->label,
        ];

        $fields = [];
        foreach ($this->fields as $field) {
            $fields[$field->getCode()] = $field->toArray();
        }
        if (count($fields)) {
            $result['fields'] = $fields;
        }

        $childs = [];
        foreach ($this->childs as $child) {
            $childs[] = $child->toArray();
        }
        if (count($childs)) {
            $result['childs'] = $childs;
        }

        if ($this->multiple) {
            $result['multiple'] = [
                'isRequired' => $this->multipleIsRequired,
                'name' => $this->multipleName,
            ];
        }

        return array_filter($result, function($el) {
            return !empty($el);
        });
    }
}
