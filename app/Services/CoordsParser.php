<?php

namespace App\Services;

use App\Models\DTO\Coords;

class CoordsParser
{
    public function parse(string $coords): Coords
    {
        $coords = explode(';', $coords);

        if (
            !empty($coords[0])
            &&
            !empty($coords[1])
            &&
            !empty($coords[2])
        ) {
            return new Coords($coords[0], $coords[1], $coords[2]);
        }

        return new Coords();
    }
}
