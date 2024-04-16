<?php

namespace Database\Seeders;

use App\Models\Alumno;
use App\Models\AlumnohasC;
use App\Models\Asignatura;
use App\Models\Boleta;
use App\Models\Calificacion;
use App\Models\Maestro;
use App\Models\Usuario;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Maestro::factory(20)->create();
        Asignatura::factory(15)->create();
        Calificacion::factory(100)->create();
        Boleta::factory(300)->create();
        Alumno::factory(300)->create();
        AlumnohasC::factory(600)->create();
    }
}
