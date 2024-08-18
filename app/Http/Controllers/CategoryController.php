<?php

namespace App\Http\Controllers;

use App\Http\Resources\Category\CategoryResource;
use App\Models\Category;
use App\Services\CategoryService;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return CategoryResource::collection(Category::all())->resolve();
    }

    public function store()
    {
        $data = [
            'title' => 'category 1'
        ];
        $category = CategoryService::create($data);
        return CategoryResource::make($category)->resolve();
    }

    public function show(Category $category)
    {
        return CategoryResource::make($category)->resolve();
    }

    public function update(Category $category)
    {
        $data = ['title' => 'updated category 1'];
        $category = CategoryService::update($data, $category);
        return CategoryResource::make($category)->resolve();
    }

    public function destroy(Category $category)
    {
        CategoryService::delete($category);
        return response()->json('Category deleted successfully');
    }
}
