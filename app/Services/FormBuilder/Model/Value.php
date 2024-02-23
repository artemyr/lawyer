<?php

namespace App\Services\FormBuilder\Model;

class Value
{
    public function __construct(
        protected int    $id,
        protected string $code,
        protected string $label,
    )
    {
    }

    public function toArray(): array
    {
        return [
            "id"=> $this->id,
            "code"=> $this->code,
            "label"=> $this->label,
        ];
    }
}
