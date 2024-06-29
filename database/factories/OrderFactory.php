<?php

namespace Database\Factories;

use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Order::class;

    public function definition(): array
    {
        return [
            'customer_name' => $this->faker->name,
            'status' => $this->faker->randomElement(['PENDENTE', 'CONCLUIDO']),
            'description' => $this->faker->paragraph(),
            'quantity' => $this->faker->numberBetween(1, 100)
        ];
    }
}
