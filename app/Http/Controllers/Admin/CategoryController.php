<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index ()
    {
        return CategoryResource::collection(Category::paginate(20));
    }

    public function show (Category $category)
    {
        return new CategoryResource($category);
    }

    public function store (StoreRequest $request)
    {
        Category::create($request->validated());
        return response([]);
    }

    public function update (UpdateRequest $request, Category $category)
    {
        $category->update($request->validated());
        return response([]);
    }

    public function destroy (Category $category)
    {
        $category->delete();
        return response([]);
    }
}
