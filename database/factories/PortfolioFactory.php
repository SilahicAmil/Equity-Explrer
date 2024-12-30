<?php

namespace Database\Factories;

use App\Models\Model;
use App\Models\Portfolio;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Model>
 */
class PortfolioFactory extends Factory
{

    protected $model = Portfolio::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $users = User::all();
        return [
            'user_id' => $users->random()->id,
            'starting_balance' => fake()->numberBetween(100000, 500000),
            'current_balance' => fake()->numberBetween(500000, 1000000),
            'rank' => 1,
            'total_gain' => fake()->numberBetween(500000, 1000000),
        ];
    }
}
