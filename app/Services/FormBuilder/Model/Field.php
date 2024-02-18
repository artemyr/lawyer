<?php

namespace App\Services\FormBuilder\Model;

use App\Services\FormBuilder\Enum\FieldTypeEnum;

class Field
{
    protected bool $multiple = false;

    /**
     * @param string $code
     * @param FieldTypeEnum $type
     * @param string $name
     * @param string $placeholder
     * @param string $label
     * @param string $caption
     * @param Value[] $values
     */
    public function __construct(
        protected string $code,
        protected FieldTypeEnum $type,
        protected string $name,
        protected string $placeholder,
        protected string $label,
        protected string $caption,
        protected array $values,
        protected mixed $value
    )
    {
    }

    public function toArray(): array
    {
        $result = [
            'name' => $this->getName(),
            'type' => $this->type,
            'placeholder' => $this->placeholder,
            'label' => $this->label,
            'caption' => $this->caption,
            'values' => array_map(fn($value) => $value->toArray(), $this->values),
            'value' => $this->value
        ];

        return array_filter($result, function($el) {
            return !empty($el);
        });
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function getName(): string
    {
        return ($this->multiple) ? $this->name.'[]' : $this->name;
    }

    public function getType(): FieldTypeEnum
    {
        return $this->type;
    }

    public function getOriginalName(): string
    {
        return $this->name;
    }

    public function setMultiple(): void
    {
        $this->multiple = true;
    }
}
