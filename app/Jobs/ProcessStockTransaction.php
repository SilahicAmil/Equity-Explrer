<?php

namespace App\Jobs;

use App\Models\Stock;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessStockTransaction implements ShouldQueue
{
    use Queueable, Dispatchable, SerializesModels, InteractsWithQueue;

    public string $stock_name;
    public string $transaction_type;

    public function __construct(string $stockName, string $transactionType)
    {
        $this->stock_name = $stockName;
        $this->transaction_type = $transactionType;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::error('Received Stock ID in Job: ' . $this->stock_name);
        Log::error('Received Stock Transaction Type: : ' . $this->transaction_type);

        $stock = Stock::where('stock_name', '=', $this->stock_name)->first();

        Log::info('Stock retrieved: ' . $stock);
        // TODO: Process Stock Transaction Logic here

        if ($this->transaction_type == 'buy') {
            $this->buyStock($stock);
        }


        // Step 1. User submits the form. TradeController Controller validates the data
        // Adds it to the Trades table. Then Here we check every minute for now to process the transaction
        // TODO: The way im doing it now is just for testing to make it easier.
        // Step2 : In the handle function we start transaction for that row
        // Either send to processBuy or processSell depending on type
        // In each respective function update the Trade table everything has been processed (done in this func)
        //
    }

    // Implement functions for processing the buys/sells
    public function buyStock(Stock $stock)
    {
        Log::error("BUY FUNCTION STOCK " . $stock);
    }
    
    public function sellStock() {}
}
