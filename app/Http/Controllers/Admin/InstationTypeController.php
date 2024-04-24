<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Instation\InstationRequest;
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

    public function store (InstationRequest $request)
    {
        $instation = InstationType::create($request->validated());
        return response(['id' => $instation->id]);
    }

    public function update (InstationRequest $request, InstationType $instation)
    {
        $instation->update($request->validated());
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
