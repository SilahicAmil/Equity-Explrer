<?php

namespace Database\Seeders;

use App\Models\Stock;
use App\Models\StockSector;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create 10 stock sectors
        StockSector::factory(25)->create();
        Stock::factory(50)->create();
    }
}
