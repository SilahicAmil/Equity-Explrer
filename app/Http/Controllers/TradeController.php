<?php

namespace App\Http\Controllers;

use App\Http\Resources\StockResource;
use App\Jobs\ProcessStockTransaction;
use App\Models\Stock;
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
            'quantity' => 'required|int',
            'type' => 'required|string'
        ]);

        $stock = Stock::where('stock_name', '=', $validated_stock['name'])->first();

        // TODO: change BUY to transaction type
        addUserActionHistory(Auth::id(), 'Stock Trade Request', 'User attempted a BUY trade request');

        // TODO: Add transaction to Trade table the in jobs check for that table instead of directly passing it
        // This is just for testing for now
        Log::error($stock);
        // Send this to the ProcessStockTransaction job
        ProcessStockTransaction::dispatch($validated_stock['name'], $validated_stock['type']);
    }
}
