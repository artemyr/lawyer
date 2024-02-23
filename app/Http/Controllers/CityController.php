<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityResource;
use App\Models\City;

class CityController extends Controller
{
    public function all()
    {
        return CityResource::collection(City::get());
    }
}
