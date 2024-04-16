<?php

use App\Http\Controllers\AlumnoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DocenteController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',function(){
    return redirect('inicio');
});
Route::view('/inicio', [RoutesController::class, 'inicio'])->name('inicio');
Route::view('/docentes', [RoutesController::class, 'docentes'])->name('docentes');
Route::view('/calendario', [RoutesController::class, 'calendario'])->name('calendario');
Route::view('/login', [RoutesController::class, 'login'])->name('login');

// rutas para docente
Route::get('/docentes/inicio', [RoutesController::class, 'inicioDocente'])->middleware('auth.docente')->name('docentes.inicio');
Route::get('/docentes/calendario', [RoutesController::class, 'calendarioDocente'])->middleware('auth.docente')-> name('docentes.calendario');
Route::get('/docentes/alumnos', [RoutesController::class, 'alumnoDocente'])->middleware('auth.docente')-> name('docentes.alumnos');
Route::get('/docentes/asignatura', [RoutesController::class, 'asignaturaDocente'])->middleware('auth.docente')-> name('docentes.asignatura');
Route::get('/docentes/asignaturadetalle/{idAsignatura}', [RoutesController::class, 'detailasignatura'])->middleware('auth.docente')->name('docentes.detailasignatura');
Route::get('/docentes/calificacion/{idAsignatura}/{grupo}', [RoutesController::class, 'calificacionDocente'])->middleware('auth.docente')->name('docentes.calificacion');
Route::get('/docentes/añadir/{idAsignatura}/{grupo}', [RoutesController::class, 'putcalificacion'])->middleware('auth.docente')->name('docentes.agregarcalificacion');
Route::get('/docentes/detalle/{alumnoid}', [RoutesController::class, 'detallecalificacion'])->middleware('auth.docente')-> name('docentes.detalle');
Route::get('/logout', [RoutesController::class, 'logout'])-> name('logout');
Route::post('/docentes/añadir', [DocenteController::class, 'guardarcalificaciones'])->middleware('auth.docente')-> name('docentes.guardar');
Route::get('/docentes/parcial/{idAsignatura}/{grupo}/{parcial}', [RoutesController::class, 'detalleparcial'])->middleware('auth.docente')-> name('docentes.parcial');


// rutas para el alumno
Route::get('/alumnos/inicio', [RoutesController::class, 'inicioAlumno'])->middleware('auth.alumno')->name('alumnos.inicio');
Route::get('/alumnos/calificacion', [RoutesController::class, 'calificacionAlumno'])->middleware('auth.alumno')->name('alumnos.calificacion');
Route::get('/alumnos/calendario', [RoutesController::class, 'calendarioAlumno'])->middleware('auth.alumno')-> name('alumnos.calendario');
Route::get('/alumnos/boleta', [RoutesController::class, 'boletaAlumno'])->middleware('auth.alumno')->name('alumnos.boleta');

Route::post('/docentes',[DocenteController::class,'store']);
Route::post('/login',[AlumnoController::class,'store']);

Route::post('/eliminar_calificacion',[DocenteController::class,'eliminarcalificacion'])->middleware('auth.docente')->name('delete.post');
Route::delete('/eliminar_calificacion',[DocenteController::class,'eliminarcalificacion'])->middleware('auth.docente')->name('delete');

