<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence(5),
            'nivel' => $this->faker->sentence(2),
            'duracion' => $this->faker->numberBetween($min = 1, $max = 100),
            'precio' => $this->faker->sentence(5),
            'imagen' => $this->faker->uuid() . '.jpg'
        ];
    }
}
