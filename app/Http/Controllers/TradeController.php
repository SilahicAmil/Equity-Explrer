<?php

namespace App\Http\Controllers;

use App\Http\Resources\StockResource;
use App\Models\Stock;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TradeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): void
    {
        // Used in profile of like a trading history type way
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {

        $validated_stock = $request->validate([
            'name' => 'required|string',
            // 'stock_sector' => 'required|string',
            // 'symbol' => 'required|string',
            // 'current_price' => 'required|int',
            // 'quantity' => 'required|int'
        ]);

        $stock = Stock::where('stock_name', '=', $validated_stock['name'])->first();

        Log::error($stock);
        // TODO: Used for the stocktransaction job for buy
        // Will do validation here and etc

        // Essentially how this works is from the figma design.
        // On the homepage we'll have stocks on the left and a box for making the trade on the right
        // When a user clicks a stock we display it on the right (name, price and etc) (useState and prop passing)
        // When users submit then it hits the TradeController store method and queues up a job
        // TradeBox will just be a form that submits post data to /trades -> TradeController.store
        // StockList will just be a table of stocks pretty ez that on click setsSelectedStock in parent ez pz
    }
}
