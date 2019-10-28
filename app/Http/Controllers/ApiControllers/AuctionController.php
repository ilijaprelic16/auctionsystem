<?php

namespace App\Http\Controllers\ApiControllers;

use App\Http\Resources\AuctionResource;
use App\Models\Auction;
use App\Http\Controllers\Controller;
use App\Services\AuctionService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    protected $auctionService;


    public function __construct(AuctionService $auctionService)
    {
        $this->auctionService = $auctionService;
    }

    public function index()
    {
        return AuctionResource::collection($this->auctionService->all());
    }


    public function store(Request $request)
    {
        return new AuctionResource($this->auctionService->create($request));
    }

    public function show(Auction $auction)
    {
        return new AuctionResource($this->auctionService->find($auction->id));

    }

    public function edit(Auction $auction)
    {
        //
    }

    public function update(Request $request, Auction $auction)
    {
        //
    }


    public function destroy(Auction $auction)
    {
        //
    }
}
