<?php

namespace App\Services\FormBuilder\Model;

class Value
{
    public function __construct(
        protected int $id,
        protected string $code,
        protected string $labelEn,
        protected string $labelRu,
    )
    {
    }

    public function toArray(): array
    {
        return [
            "id"=> $this->id,
            "code"=> $this->code,
            "label_en"=> $this->labelEn,
            "label_ru"=> $this->labelRu
        ];
    }
}
