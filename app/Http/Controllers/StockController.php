<?php

namespace App\Http\Controllers;

use App\Http\Resources\StockResource;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $stocks = StockResource::collection(Stock::all());
        return inertia('Stocks/Index', [
            'stocks' => $stocks,
        ]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Stock Details Page
    }

}
