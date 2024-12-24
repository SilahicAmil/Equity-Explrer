<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Stock;
use App\Models\StockSector;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class StockFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Stock::class;

    public function definition(): array
    {
        $stockSectors = StockSector::all();
        return [
            'symbol' => fake()->unique()->word,
            'stock_name' => fake()->company,
            'current_price' => fake()->randomFloat(2, 1, 1000),
            'stock_sector' => $stockSectors->random()->id,
        ];
    }
}
