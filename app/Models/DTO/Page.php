<?php

namespace App\Models\DTO;

class Page
{
    public string $title;
    public string $headerClass;

    public function __construct(string $title = '', string $headerClass = '')
    {
        $this->title = $title;
        $this->headerClass = $headerClass;
    }
}
