<?php

namespace App\Http\Controllers\WebControllers\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{


    /**
     * Get All Products For Current User
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }


    /**
     * Store a newly created Product in storage.
     *
     * @param Request $request
     * @return ProductResource
     */
    public function store(Request $request)
    {
        return new ProductResource($this->productService->create($request));
    }


    /**
     * Get One Product
     *
     * @param Product $product
     * @return ProductResource
     */
    public function show(Product $product)
    {
        return new ProductResource($this->productService->find($product->id));
    }

    /**
     * Update the specified Product in storage.
     *
     * @param Request $request
     * @param Product $product
     * @return ProductResource
     */
    public function update(Request $request, Product $product)
    {
        return new ProductResource($this->productService->update($request,$product->id));
    }

    /**
     * Remove the specified Product from storage.
     *
     * @param Product $product
     * @return ProductResource
     */
    public function destroy(Product $product)
    {
        return new ProductResource($this->productService->delete($product->id));
    }
}
