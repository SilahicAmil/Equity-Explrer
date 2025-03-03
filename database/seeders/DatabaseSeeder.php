<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Stock;
use App\Models\StockSector;
use App\Models\TradeStatus;
use App\Models\TradeType;
use App\Models\User;
use Database\Factories\PortfolioFactory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(1)->create();
        // Create 10 stock sectors
        StockSector::factory(25)->create();
        Stock::factory(50)->create();
        Portfolio::factory(1)->create();
        $statuses = [
            ['id' => 1, 'status_name' => 'Q',  'description' => 'Queued'],
            ['id' => 2, 'status_name' => 'P',  'description' => 'Processing'],
            ['id' => 3, 'status_name' => 'C',  'description' => 'Completed'],
            ['id' => 4, 'status_name' => 'E',  'description' => 'Error'],
        ];

        foreach ($statuses as $status) {
            TradeStatus::updateOrCreate(['status_name' => $status['status_name']], $status);
        }

        $types = [
            ['id' => 1, 'type' => 'buy',  'description' => 'Purchasing a stock'],
            ['id' => 2, 'type' => 'sell',  'description' => 'Selling a stock'],
        ];

        foreach ($types as $type) {
            TradeType::updateOrCreate(['type' => $type['type']], $type);
        }
    }
}
