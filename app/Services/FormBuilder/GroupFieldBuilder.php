<?php

namespace App\Services\FormBuilder;

use App\Services\FormBuilder\Enum\GroupFieldTypeEnum;
use App\Services\FormBuilder\Model\Field;
use App\Services\FormBuilder\Model\GroupField;

class GroupFieldBuilder
{
    protected GroupFieldTypeEnum $type;

    /** @var Field[] */
    protected array $fields = [];

    /** @var GroupField[] */
    protected array $childs = [];
    protected string $label = '';

    protected bool $multiple = false;
    protected bool $multiIsRequired = false;
    protected string $multiName = '';

    public static function createInstance(): static
    {
        return new static();
    }

    public function configureType(GroupFieldTypeEnum $type): static
    {
        $this->type = $type;
        return $this;
    }

    public function configureLabelEn(string $labelEn): static
    {
        $this->labelEn = $labelEn;
        return $this;
    }

    public function configureLabelRu(string $labelRu): static
    {
        $this->labelRu = $labelRu;
        return $this;
    }

    /**
     * @param bool $isRequired
     * @param string $nameRu
     * @param string $nameEn
     * @return $this
     */
    public function configureMultiple(bool $isRequired, string $nameEn, string $nameRu): static
    {
        $this->multiple = true;
        $this->multiIsRequired = $isRequired;
        $this->multiNameEn = $nameEn;
        $this->multiNameRu = $nameRu;
        return $this;
    }

    public function addField(Field $field): static
    {
        $this->fields[] = $field;
        return $this;
    }

    public function addChild(GroupField $groupField): static
    {
        $this->childs[] = $groupField;
        return $this;
    }

    public function create(): GroupField
    {
        $groupField = new GroupField(
            type: $this->type,
            fields: $this->fields,
            childs: $this->childs,
            label: $this->label,

            multiple: $this->multiple,
            multipleIsRequired: $this->multiIsRequired,
            multipleName: $this->multiName,
        );

        $this->flush();

        return $groupField;
    }

    public function flush(): void
    {
        unset($this->type);
        $this->fields = [];
        $this->childs = [];
        $this->labelEn = '';
        $this->labelRu = '';
    }
}
