<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
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
        $arrayValues = ['PENDING', 'PROGRESS', 'COMPLETED'];
        return [
            'name' => fake()->sentence(2),
            'user_id' => User::all()->random()->id,
            'description' => fake()->sentence(15),
            'state' => $arrayValues[rand(0,2)]
        ];
    }
}
