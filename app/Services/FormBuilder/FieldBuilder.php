<?php

namespace App\Services\FormBuilder;

use App\Services\FormBuilder\Enum\FieldTypeEnum;
use App\Services\FormBuilder\Model\Field;
use App\Services\FormBuilder\Model\Value;

class FieldBuilder
{
    protected string $code;
    protected string $name;
    protected FieldTypeEnum $type;
    protected string $placeholder = '';
    protected string $label = '';

    /**
     * @var Value[]
     */
    protected array $values = [];
    protected string $caption = '';
    protected mixed $value = '';

    public static function createInstance(): static
    {
        return new static();
    }

    public function configureCode(string $code): static
    {
        $this->code = $code;
        return $this;
    }

    public function configureName(string $name): static
    {
        $this->name = $name;
        return $this;
    }

    public function configureType(FieldTypeEnum $typeEnum): static
    {
        $this->type = $typeEnum;
        return $this;
    }

    public function configurePlaceholder(string $placeholder): static
    {
        $this->placeholder = $placeholder;
        return $this;
    }

    public function configureLabel(string $label): static
    {
        $this->label = $label;
        return $this;
    }

    public function configureValue(mixed $value): static
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @param Value[] $values
     * @return $this
     */
    public function configureValues(array $values): static
    {
        $this->values = $values;
        return $this;
    }

    public function configureCaption(string $caption): static
    {
        $this->caption = $caption;
        return $this;
    }

    public function create(): Field
    {
        $value = $this->value;
        if ($value instanceof Value) {
            $value = $value->toArray();
        }

        $field =  new Field(
            code: $this->code,
            type: $this->type,
            name: $this->name,
            placeholder: $this->placeholder,
            label: $this->label,
            caption: $this->caption,
            values: $this->values,
            value: $value
        );

        $this->flush();

        return $field;
    }

    protected function flush(): void
    {
        unset($this->code);
        unset($this->name);
        $this->placeholder = '';
        $this->label = '';
        $this->caption = '';
        $this->values = [];
        $this->value = '';
    }
}
