<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maestros', function (Blueprint $table) {
            $table->id();
            $table->string('correo')->unique();
            $table->string('name')->unique();
            $table->string('password');
            $table->timestamps();
        });

        Schema::create('asignaturas', function (Blueprint $table) {
            $table->id();
            $table->string('asignatura');
            $table->unsignedBigInteger('id_maestro');
            $table->unsignedTinyInteger('semestre');
            $table->foreign('id_maestro')->references('id')->on('maestros');
            $table->timestamps();
        });
        Schema::create('calificacions', function (Blueprint $table) {
            $table->id();
            $table->float('calificacion',4,2);
            $table->unsignedTinyInteger('parcial');
            $table->unsignedBigInteger('id_asignatura');
            $table->foreign('id_asignatura')->references('id')->on('asignaturas');
            $table->timestamps();
        });
        Schema::create('boletas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_asignatura');
            $table->foreign('id_asignatura')->references('id')->on('asignaturas');
            $table->timestamps();
        });
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string('correo')->unique();
            $table->string('name')->unique();
            $table->string('password');
            $table->string('grupo');
            $table->unsignedBigInteger('id_boleta');
            $table->foreign('id_boleta')->references('id')->on('boletas');
            $table->timestamps();
        });
        Schema::create('alumnohas_c_s', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_alumno');
            $table->foreign('id_alumno')->references('id')->on('alumnos');
            $table->unsignedBigInteger('id_calificacion');
            $table->foreign('id_calificacion')->references('id')->on('calificacions')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('maestros');
        Schema::dropIfExists('calificacions');
        Schema::dropIfExists('asignaturas');
        Schema::dropIfExists('boletas');
        Schema::dropIfExists('alumnos');
        Schema::dropIfExists('alumnohas_c_s');
    }
};
