<?php

namespace App\Models\DTO;

class Coords
{
    /**
     * по умолчанию координаты москвы
     * @param float $lat
     * @param float $lon
     * @param float $zoom
     */
    public function __construct(
        public float $lat = 37.633087,
        public float $lon = 55.714930,
        public float $zoom = 10
    )
    {
    }
}
