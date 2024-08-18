<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Category\StoreRequest;
use App\Http\Requests\Category\UpdateRequest;
use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all())->resolve();
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $category = CategoryService::create($data);
        return CategoryResource::make($category)->resolve();
    }

    public function show(Category $category)
    {
        return CategoryResource::make($category)->resolve();
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $data = $request->validated();
        $category = CategoryService::update($data, $category);
        return CategoryResource::make($category)->resolve();
    }

    public function destroy(Category $category)
    {
        CategoryService::delete($category);
        return response()->json('Category deleted successfully');
    }
}
