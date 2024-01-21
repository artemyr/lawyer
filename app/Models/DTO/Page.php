<?php

namespace App\Models\DTO;

class Page
{
    public string $title;

    public function __construct(string $title = '')
    {
        $this->title = $title;
    }
}
