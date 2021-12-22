<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\ProductPropertyRequest;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductPropertyCollection;
use App\Http\Resources\ProductPropertyResource;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductProperty;
use App\Service\Upload;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductPropertyController extends BaseController
{
    public function index()
    {
        return new ProductPropertyCollection(ProductProperty::all());
    }

    public function store(ProductPropertyRequest $request)
    {

        $result=ProductProperty::create( $request->all());
        return response([
            'data' => new ProductPropertyResource($result)
        ],Response::HTTP_CREATED);

    }

    public function show(ProductProperty $productProperty)
    {
        return new ProductPropertyResource($productProperty);
    }

    public function update(ProductPropertyRequest $request, ProductProperty $productProperty)
    {
        $productProperty->update($request->all());

        return response([
            'data' => new ProductPropertyResource($productProperty)
        ],Response::HTTP_CREATED);

    }

    public function destroy(ProductProperty $productProperty)
    {
        $productProperty->delete();

        return response(__('app.deleteMsg'),Response::HTTP_OK);
    }

}
