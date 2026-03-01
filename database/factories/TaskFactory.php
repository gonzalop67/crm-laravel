<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Contact>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->text,
            'due_date' => fake()->dateTimeBetween('-2 weeks', '+2 weeks'),
            'user_id' => User::inRandomOrder()->first()->id ?? User::factory()->create()->id,
            'client_id' => Client::inRandomOrder()->first()->id ?? Client::factory()->create()->id,
        ];
    }
}
