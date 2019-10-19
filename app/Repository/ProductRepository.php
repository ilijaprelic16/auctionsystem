<?php


namespace App\Repository;


use App\Models\Product;

class ProductRepository
{
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public function create($attributes)
    {
        return $this->product->create($attributes);
    }

    public function all()
    {
        return $this->product->all();
    }

    public function allForUser($id)
    {
        return $this->product->all()->where('user_id',1);
    }

    public function find($id)
    {
        return $this->product->find($id);
    }

    public function update($id, array $attributes)
    {
        return $this->product->find($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->product->find($id)->delete();
    }
}
