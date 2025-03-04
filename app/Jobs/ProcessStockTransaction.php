<?php

namespace App\Jobs;

use App\Models\Trade;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProcessStockTransaction implements ShouldQueue
{
    use Queueable, Dispatchable, SerializesModels, InteractsWithQueue;


    public function __construct() {}

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $trades = Trade::where('status', '=', 1)->first();
        // Add to UserTradeHistory when processing job. After we get a sucessful return from processBuy/SellTrade
        // Need user_id, stock_id and trade type - which we have get from the $trades
        Log::error("TRADES " . $trades);
        Log::error("TRADES 123123 " . $trades['stock_id']);
    }

    // Implement functions for processing the buys/sells
    public function processBuyTrade(Trade $trade)
    {
        Log::error("BUY FUNCTION STOCK " . $trade);
    }

    public function processSellTrade() {}
}
