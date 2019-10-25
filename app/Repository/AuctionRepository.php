<?php


namespace App\Repository;


use App\Models\Auction;
use App\Models\Product;

class AuctionRepository
{
    protected $auction;

    public function __construct(Auction $auction)
    {
        $this->auction = $auction;
    }

    public function create($attributes)
    {
        return $this->auction->create($attributes);
    }

    public function all()
    {
        return $this->auction->all();
    }

    public function product($id)
    {
        return $this->auction->all()->where('product_id',$id);
    }

    public function find($id)
    {
        return $this->auction->find($id);
    }

    public function update($id, array $attributes)
    {
        return $this->auction->find($id)->update($attributes);
    }

    public function delete($id)
    {
        return $this->auction->find($id)->delete();
    }
}
