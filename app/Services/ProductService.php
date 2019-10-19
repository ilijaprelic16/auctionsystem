<?php


namespace App\Services;


use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function all()
    {
        return $this->productRepository->all();
    }


    public function allForUser($id)
    {
        return $this->productRepository->allForUser($id);
    }

    public function create(Request $request)
    {
        $attributes = $request->all();

        return $this->productRepository->create($attributes);
    }

    public function find($id)
    {
        return $this->productRepository->find($id);
    }

    public function update(Request $request,$productId)
    {
        $attributes = $request->all();
        return $this->productRepository->update($productId, $attributes);
    }

    public function delete($id)
    {
        return $this->productRepository->delete($id);
    }

}
