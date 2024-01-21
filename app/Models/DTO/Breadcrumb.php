<?php

namespace App\Models\DTO;

class Breadcrumb
{
    public function __construct(
        public string $link,
        public string $title,
    ){
    }
}
