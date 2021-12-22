<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\CategoryRequest;
use App\Http\Resources\CategoryCollection;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CategoryController extends BaseController
{
    public function index()
    {
        return new CategoryCollection(Category::all());
    }

    public function store(CategoryRequest $category)
    {
        $result=Category::create( $category->all());
        return response([
            'data' => new CategoryResource($result)
        ],Response::HTTP_CREATED);

    }

    public function show(Category $category)
    {
        return new CategoryResource($category);
    }

    public function update(CategoryRequest $request, ProductProperty $category)
    {
        $category->update($request->all());

        return response([
            'data' => new CategoryRequest($category)
        ],Response::HTTP_CREATED);

    }

    public function destroy(Category $category)
    {
        $category->delete();

        return response(__('app.deleteMsg'),Response::HTTP_OK);
    }

}
