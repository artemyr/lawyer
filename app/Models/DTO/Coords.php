<?php

namespace App\Models\DTO;

class Coords
{

    /**
     * @param float $lat
     * @param float $lon
     * @param float $zoom
     */
    public function __construct(
        public float $lat,
        public float $lon,
        public float $zoom
    )
    {
    }
}
