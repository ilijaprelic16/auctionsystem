<?php


namespace App\Services;


use App\Repository\AuctionRepository;
use App\Repository\ProductRepository;
use Carbon\Carbon;
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
        $attributes = [
            'product_id' => $request->product_id,
            'active' => true,
            'start_time' => Carbon::now(),
            'end_time' => Carbon::now()->addHours($request->duration)
        ];

        return $this->auctionRepository->create($attributes);
    }

    public function find($id)
    {
        return $this->auctionRepository->find($id);
    }

    public function update(Request $request, $productId)
    {
        $attributes = $request->all();
        return $this->auctionRepository->update($productId, $attributes);
    }

    public function delete($id)
    {
        return $this->auctionRepository->delete($id);
    }

    public static function timeLeft($end_date)
    {
        return Carbon::now()->diffInHours($end_date);
    }

}
