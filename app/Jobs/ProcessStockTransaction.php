<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Log;

class ProcessStockTransaction implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Log::error('1234');
        // TODO: Process Stock Transaction Logic here

        // Step 1. User submits the form. StockTransaction Controller validates the data
        // Adds it to the Trades table. Then Here we check every minute for now to process the transaction
        // Step2 : In the handle function we start transaction for that row
        // Either send to processBuy or processSell depending on type
        // In each respective function update the Trade table everything has been processed (done in this func)
        //
    }

    // Implement functions for processing the buys/sells
}
