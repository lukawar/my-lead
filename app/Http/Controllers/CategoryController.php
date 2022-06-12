<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryAddRequest;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;

/**
 * @group Category
 *
 * APIs for managing categories
 */
class CategoryController extends Controller
{
    /**
     * Add new category
     *
     * @param CategoryAddRequest $request
     * @param Category $category
     * @return CategoryResource
     */
    public function add(CategoryAddRequest $request)
    {
        $category = Category::create($request->validated());

        return new CategoryResource($category);
    }
}
