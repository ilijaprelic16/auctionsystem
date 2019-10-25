<?php


namespace App\Services;


use App\Repository\AuctionRepository;
use App\Repository\ProductRepository;
use Illuminate\Http\Request;

class AuctionService
{
    protected $auctionRepository;

    public function __construct(AuctionRepository $auctionRepository)
    {
        $this->auctionRepository = $auctionRepository;
    }

    public function all()
    {
        return $this->auctionRepository->all();
    }


    public function product($id)
    {
        return $this->auctionRepository->product($id);
    }

    public function create(Request $request)
    {
        $attributes = $request->all();
        $attributes['user_id'] = auth('api')->user()->id;

        return $this->auctionRepository->create($attributes);
    }

    public function find($id)
    {
        return $this->auctionRepository->find($id);
    }

    public function update(Request $request,$productId)
    {
        $attributes = $request->all();
        return $this->auctionRepository->update($productId, $attributes);
    }

    public function delete($id)
    {
        return $this->auctionRepository->delete($id);
    }

}
