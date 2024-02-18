<?php

namespace App\Services\FormBuilder;

use App\Services\FormBuilder\Model\GroupField;

class FormBuilder
{
    /** @var GroupField[] */
    protected array $groupFields = [];

    public static function createInstance(): static
    {
        return new static();
    }

    public function addGroupField(GroupField $groupField): static
    {
        $this->groupFields[] = $groupField;

        return $this;
    }

    /**
     * @return GroupField[]
     */
    public function getGroupFields(): array
    {
        return $this->groupFields;
    }
}
