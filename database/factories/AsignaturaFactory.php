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
        'asignatura'=>$this->faker->randomElement([
            'Matemáticas',
            'Inglés',
            'Desarrollo Web',
            'Calcúlo Integral',
            'Base de datos',
            'Ciberseguridad',
            'Organizacion del trabajo',
            'Aplicaciones Web',
            'Diseño',
            'Seguridad informática',
            'Tutoria',
            'Algebra'
        ]),
        'id_maestro'=>fake()->numberBetween(1,20),
        'semestre' => $this->faker->numberBetween(1, 3),
        ];
    }
}
