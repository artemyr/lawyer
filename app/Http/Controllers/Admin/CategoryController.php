<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Services\FormBuilder\Enum\TypeEnum;

class CategoryController extends Controller
{
    public function index ()
    {
        return CategoryResource::collection(Category::orderBy('sort')->paginate(20));
    }

    public function show (Category $category)
    {
        return new CategoryResource($category);
    }

    public function store (StoreRequest $request)
    {
        $category = Category::create($request->validated());
        return response(['id' => $category->id]);
    }

    public function update (UpdateRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response(['id' => $category->id]);
    }

    public function destroy (Category $category)
    {
        $category->delete();
        return response(['id' => $category->id]);
    }

    public function controls(Category $category)
    {
        return response(TypeEnum::CATEGORY->getForm($category)->toArray());
    }
}
