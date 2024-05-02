<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InstationType\InstationTypeCreateRequest;
use App\Http\Requests\InstationType\InstationTypeUpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Models\InstationType;
use App\Services\FormBuilder\Enum\TypeEnum;

class InstationTypeController extends Controller
{
    public function index ()
    {
        return CategoryResource::collection(InstationType::paginate(20));
    }

    public function show (InstationType $instation)
    {
        return new CategoryResource($instation);
    }

    public function store (InstationTypeCreateRequest $request)
    {
        $fields = $request->validated();
        $cityIds = $fields['city_id'];
        unset($fields['city_id']);
        $instation = InstationType::create($fields);
        $instation->cities()->attach($cityIds);
        return response(['id' => $instation->id]);
    }

    public function update (InstationTypeUpdateRequest $request, InstationType $instation)
    {
        $fields = $request->validated();
        $cityIds = $fields['city_id'];
        unset($fields['city_id']);
        $instation->update($fields);
        $instation->cities()->sync($cityIds);
        return response(['id' => $instation->id]);
    }

    public function destroy (InstationType $instation)
    {
        $instation->delete();
        return response(['id' => $instation->id]);
    }

    public function controls(InstationType $instation)
    {
        return response(TypeEnum::INSTATION_TYPE->getForm($instation)->toArray());
    }
}
