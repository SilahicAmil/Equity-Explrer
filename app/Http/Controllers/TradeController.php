<?php

namespace App\Http\Controllers;

use App\Http\Resources\StockResource;
use App\Models\Stock;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
        // TODO: change BUY to transaction type
        addUserActionHistory(Auth::id(), 'Stock Trade Request', 'User attempted a BUY trade request');
        Log::error($stock);
        // TODO: Used for the stocktransaction job for buy/sell

    }
}
