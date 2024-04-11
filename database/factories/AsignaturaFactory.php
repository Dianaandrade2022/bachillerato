<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Asignatura>
 */
class AsignaturaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
        'asignatura'=>fake()->name(),
        'id_maestro'=>fake()->numberBetween(1,15),
        'id_calificacion'=>fake()->numberBetween(1,300),
        ];
    }
}
