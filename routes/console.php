<?php

use App\Jobs\ProcessStockTransaction;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();


// This is how we schedule a job every minute. Basically a cron job
//TODO: Uncomment this later on once stockTransaction is processed
// Schedule::job(new ProcessStockTransaction())->everyMinute();
//* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
