<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Api\BaseController;
use App\Http\Requests\ProductRequest;
use App\Http\Resources\ProductCollection;
use App\Http\Resources\ProductPropertyCollection;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Models\ProductProperty;
use App\Service\Upload;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProductController extends BaseController
{
    public function index()
    {
        return new ProductCollection(Product::all());
    }

    public function store(ProductRequest $request)
    {
        $img=null;
        if ($request->hasFile('img')) {
            $img=Upload::handleUploadedImage($request->file('img'),public_path('storage/images'));
        }

        $data = $request->all();
        $data['img'] = $img;
        $result=Product::create($data);
        return response([
            'data' => new ProductResource($result)
        ],Response::HTTP_CREATED);

    }

    public function show(Product $product)
    {
        return new ProductResource($product);
    }

    public function update(ProductRequest $request, Product $product)
    {
        $product->update($request->all());

        return response([
            'data' => new ProductResource($product)
        ],Response::HTTP_CREATED);

    }

    public function destroy(Product $product)
    {
        $product->delete();

        return response(__('app.deleteMsg'),Response::HTTP_OK);
    }

}
