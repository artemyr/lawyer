<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Instation\InstationRequest;
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

    public function store (InstationRequest $request)
    {
        $instation = Instation::create($request->validated());
        return response(['id' => $instation->id]);
    }

    public function update (InstationRequest $request, Instation $instation)
    {
        $instation->update($request->validated());
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
