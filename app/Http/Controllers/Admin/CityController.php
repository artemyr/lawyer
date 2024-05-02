<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\City\CityCreateRequest;
use App\Http\Requests\City\CityUpdateRequest;
use App\Http\Resources\CityResource;
use App\Models\City;
use App\Services\FormBuilder\Enum\TypeEnum;

class CityController extends Controller
{
    public function index()
    {
        return CityResource::collection(City::paginate(20));
    }

    public function show(City $city)
    {
        return new CityResource($city);
    }

    public function store(CityCreateRequest $request)
    {
        $city = City::create($request->validated());
        return response(['id' => $city->id]);
    }

    public function update(CityUpdateRequest $request, City $city)
    {
        $city->update($request->validated());
        return response(['id' => $city->id]);
    }

    public function destroy(City $city)
    {
        $city->delete();
        return response(['id' => $city->id]);
    }

    public function controls(City $city)
    {
        return response(TypeEnum::CITY->getForm($city)->toArray());
    }
}
