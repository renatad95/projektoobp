<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Movie;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'description' => $this->faker->text(100),
            'grade' => $this->faker->numberBetween(1,10),
            'actor' => $this->faker->numberBetween(1,10),
            'genre' => $this->faker->numberBetween(1,8),
            'movie_period' => $this->faker->numberBetween(1,35),
        ];
    }
}
