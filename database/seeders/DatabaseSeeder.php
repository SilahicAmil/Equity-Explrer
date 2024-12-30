<?php

namespace Database\Seeders;

use App\Models\Portfolio;
use App\Models\Stock;
use App\Models\StockSector;
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
    }
}
