<?php

use App\Jobs\ProcessStockTransaction;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


// Schedule trades to run
Artisan::command('trades:process', function () {
    ProcessStockTransaction::dispatch();
    $this->info('Queued trades are being processed.');
})->describe('Process all trades with status Q (Queued).');

// TODO : Put this in a cron job (crontab)
//* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
