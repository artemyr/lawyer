<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Instation\InstationCreateRequest;
use App\Http\Requests\Instation\InstationUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Instation;
use App\Services\FormBuilder\Enum\TypeEnum;

class InstationController extends Controller
{
    public function index ()
    {
        return CategoryResource::collection(Instation::orderBy('sort')->paginate(20));
    }

    public function show (Instation $instation)
    {
        return new CategoryResource($instation);
    }

    public function store (InstationCreateRequest $request)
    {
        $fields = $request->validated();
        $cityIds = $fields['city_id'];
        unset($fields['city_id']);
        $instation = Instation::create($fields);
        $instation->cities()->attach($cityIds);
        return response(['id' => $instation->id]);
    }

    public function update (InstationUpdateRequest $request, Instation $instation)
    {
        $fields = $request->validated();
        $cityIds = $fields['city_id'];
        unset($fields['city_id']);
        $instation->update($fields);
        $instation->cities()->sync($cityIds);
        return response(['id' => $instation->id]);
    }

    public function destroy (Instation $instation)
    {
        $instation->delete();
        return response(['id' => $instation->id]);
    }

    public function controls(Instation $instation)
    {
        return response(TypeEnum::INSTATION->getForm($instation)->toArray());
    }
}
