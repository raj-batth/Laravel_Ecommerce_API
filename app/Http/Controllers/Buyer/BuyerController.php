<?php

namespace App\Http\Controllers\Buyer;

use App\Buyer;
use App\Http\Controllers\Controller;
use App\Http\Resources\Buyer\BuyerResource;
use App\Http\Resources\Buyer\BuyerCollection;
use App\Services\Pagination\PaginationFacade;
use App\Services\FilterAndSort\FilterAndSortFacade;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  Buyer $buyer
     * @return \Illuminate\Http\Response
     */
    public function index(Buyer $buyer)
    {
        // ! If the User has atleast one Transaction then he is a Buyer
        // $buyers = Buyer::has('transactions')->get();

        // ? Buyer::has('transactions') is being handled in the BuyerScope
        $buyers = $buyer->all();
        $filteredAndSortedBuyers = FilterAndSortFacade::apply($buyers, $buyer);
        $paginatedBuyers = PaginationFacade::apply($filteredAndSortedBuyers);

        return BuyerCollection::collection($paginatedBuyers);
    }

    /**
     * Display the specified resource.
     *
     * @param  Buyer $buyer
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $buyer)
    {
        // $buyer = Buyer::has('transactions')->findOrFail($id);

        // ? Buyer::has('transactions') is being handled in the BuyerScope
        return new BuyerResource($buyer);
    }
}
