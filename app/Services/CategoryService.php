<?php

namespace App\Services;

use App\Models\Category;

class CategoryService
{
    /**
     * Create a new class instance.
     */
    public static function create(array $data): Category
    {
        return Category::create($data);
    }

    public static function update(array $data, Category $category): Category
    {
        $category->update($data);
        return $category;
    }

    public static function delete(Category $category): void
    {
        $category->delete();
    }
}
