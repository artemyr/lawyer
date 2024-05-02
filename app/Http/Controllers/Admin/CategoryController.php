<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\CategoryCreateRequest;
use App\Http\Requests\Category\CategoryUpdateRequest;
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

    public function store (CategoryCreateRequest $request)
    {
        $fields = $request->validated();
        $cityIds = $fields['city_id'];
        unset($fields['city_id']);
        $category = Category::create($fields);
        $category->cities()->attach($cityIds);
        return response(['id' => $category->id]);
    }

    public function update (CategoryUpdateRequest $request, Category $category)
    {
        $fields = $request->validated();
        $cityIds = $fields['city_id'];
        unset($fields['city_id']);
        $category->update($fields);
        $category->cities()->sync($cityIds);
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
