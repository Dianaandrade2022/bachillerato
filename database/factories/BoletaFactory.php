<?php

namespace Database\Factories;

use App\Models\Boleta;
use Illuminate\Database\Eloquent\Factories\Factory;

class BoletaFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Boleta::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_asignatura' => $this->faker->numberBetween(1, 40),
            'semestre' => $this->faker->numberBetween(1, 3),
            'grupo' => $this->faker->randomElement(['A', 'B']),
            'promedio' => $this->faker->randomFloat(1,7, 10)
        ];
    }
}
