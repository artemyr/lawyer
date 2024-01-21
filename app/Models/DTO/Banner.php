<?php

namespace App\Models\DTO;

class Banner
{
    public function __construct(
        public string $bigImage,
        public string $averageImage,
        public string $smallImage,
        public string $title,
    ){
    }
}
