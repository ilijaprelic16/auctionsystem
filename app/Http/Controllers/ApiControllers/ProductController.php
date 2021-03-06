<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

use App\Services\ProductService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    protected $productService;

    /**
     * ProductController constructor.
     * @param ProductService $productService
     */
    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    /**
     * Get All Products For Current User
     *
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
       return ProductResource::collection($this->productService->allForUser(auth('api')->user()->id));
    }


    /**
     * Store a newly created Product in storage.
     *
     * @param Request $request
     * @return ProductResource
     */
    public function store(Request $request)
    {
        return new ProductResource($this->productService->store($request));
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
     * @param $id
     * @return ProductResource
     */
    public function destroy($id)
    {
        $this->productService->delete($id);
        return response()->json([
            'message' => "Product with id $id deleted."
        ]);
    }
}
