<?php

namespace App\Models\DTO;

class Prop
{
    public function __construct(
        protected string $label,
        protected string $value
    )
    {
    }

    public function getLabel(): string
    {
        return $this->label;
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
