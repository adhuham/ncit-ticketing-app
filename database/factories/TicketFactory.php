<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ticket>
 */
class TicketFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'description' => $this->faker->paragraph(),
            'user_id' => \App\Models\User::factory(),
            'status' => $this->faker->randomElement(['open', 'in-progress', 'closed']),
            'priority' => $this->faker->randomElement(['low', 'medium', 'high']),
            'category_id' => \App\Models\Category::factory(),
        ];
    }
}
