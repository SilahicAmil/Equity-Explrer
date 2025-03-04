<?php

namespace App\Http\Controllers;

use App\Helpers\Helpers;
use App\Jobs\ProcessStockTransaction;
use App\Models\Portfolio;
use App\Models\Stock;
use App\Models\Trade;
use App\Models\TradeStatus;
use App\Models\TradeType;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class TradeTransactionController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): void
    {

        Log::error($request);
        $validated_stock = $request->validate([
            'name' => 'required|string',
            'quantity' => 'required|int',
            'type' => 'required|string'
        ]);

        $stock = Stock::where('stock_name', '=', $validated_stock['name'])->first();
        Helpers::addUserActionHistory(Auth::id(), 'Stock Trade Request', "User attempted a {$validated_stock['type']} trade request");

        $portfolio_id = Portfolio::where('user_id', Auth::id())->first()->id;
        $stock_id = Stock::where('stock_name', $validated_stock['name'])->first()->id;
        $trade_type = TradeType::where('type', $validated_stock['type'])->first()->id;
        $trade_status = TradeStatus::where('status_name', 'Q')->first()->id;

        Trade::create([
            'portfolio_id' => $portfolio_id,
            'stock_id' => $stock_id,
            'trade_type' => $trade_type,
            'quantity' => 3,
            'price_per_stock' => 100,
            'total_amount' => 300,
            'trade_time' => Carbon::now(),
            'queue_time' => Carbon::now(),
            'status' => $trade_status
        ]);

        // Maybe eventually add like a minute delay?
        ProcessStockTransaction::dispatch();
        // Dispatch a toast notification
    }
}
