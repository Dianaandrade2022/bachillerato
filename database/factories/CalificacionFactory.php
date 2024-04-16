<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CalificacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'calificacion' => fake()->randomFloat(1,5,10),
            'parcial'=>fake()->numberBetween(1,3),
            'id_asignatura' =>fake()->numberBetween(1,15)
        ];
    }
}
