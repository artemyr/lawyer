<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\City\StoreRequest;
use App\Http\Requests\City\UpdateRequest;
use App\Http\Resources\CityResource;
use App\Models\City;

class CityController extends Controller
{
    public function index ()
    {
        return CityResource::collection(City::paginate(20));
    }

    public function show (City $city)
    {
        return new CityResource($city);
    }

    public function store (StoreRequest $request)
    {
        City::create($request->validated());
        return response([]);
    }

    public function update (UpdateRequest $request, City $city)
    {
        $city->update($request->validated());
        return response([]);
    }

    public function destroy (City $city)
    {
        $city->delete();
        return response([]);
    }
}
