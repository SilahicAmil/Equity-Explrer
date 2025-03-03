<?php

namespace App\Jobs;

use App\Helpers\Helpers;
use App\Models\Stock;
use App\Models\Trade;
use Illuminate\Container\Attributes\Auth;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
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
        // TODO: Implement User Trade History - for Buy and Sell.
        $trades = Trade::where('status', '=', 1)->get();
        Log::error("TRADES " . $trades);
    }

    // Implement functions for processing the buys/sells
    public function buyStock(Stock $stock)
    {
        Log::error("BUY FUNCTION STOCK " . $stock);
    }

    public function sellStock() {}
}
