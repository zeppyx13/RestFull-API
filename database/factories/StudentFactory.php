<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nim' => $this->faker->unique()->numerify('230040###'),
            'email' => $this->faker->unique()->safeEmail(),
            'name' => $this->faker->name(),
            'address' => $this->faker->address(),
        ];
    }
}
