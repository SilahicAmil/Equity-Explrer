<?php

namespace App\Http\Controllers;

use App\Http\Resources\StockResource;
use App\Models\Stock;
use Inertia\Response;
use Inertia\ResponseFactory;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): ResponseFactory|Response
    {

        $stocks = StockResource::collection(Stock::all());
        return inertia('Stocks/Index', [
            'stocks' => $stocks,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id): void
    {
        // Stock Details Page
    }

}
