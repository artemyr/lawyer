<?php

namespace App\Models\DTO;

class Page
{
    public function __construct(
        public string $browserTitle = '',
        public string $pageTitle = '',
        public string $headerClass = '',
        public bool $showBottomMap = true
    )
    {
    }
}
