<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\Asignatura;
use App\Models\Boleta;
use App\Models\Calificacion;
use App\Models\Maestro;
use Illuminate\Database\Seeder;

use App\Models\Usuario;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Maestro::factory(15)->create();
        Calificacion::factory(300)->create();
        // Asignatura::factory(40)->create();
        Boleta::factory(300)->create();
        // Alumno::factory(300)->create();
    }
}
