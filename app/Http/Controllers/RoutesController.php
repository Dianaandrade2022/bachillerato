<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class RoutesController extends Controller
{
    public function inicio()
    {
        return view('inicio');
    }
    public function docentes()
    {
        return view('docentes');
    }

    public function calendario()
    {
        return view('calendario');
    }

    public function login()
    {
        return view('login');
    }

    public function inicioDocente()
    {
        $maestro = session('maestro');
        return view('/docentes/inicio', ['maestro' => $maestro]);
    }
    public function inicioAlumno()
    {
        $alumno = session('alumno');
        return view('/alumnos/inicio', ['alumno' => $alumno]);
    }
    public function calificacionAlumno()
    {
        //

        $alumno = session('alumno')->name;
        $alumnoId = session('alumno')->id;

        $calificaciones = DB::table('boletas as b')
            ->join('asignaturas as ag', 'b.id_asignatura', '=', 'ag.id')
            ->join('alumnos as al', 'b.id', '=', 'al.id_boleta')
            ->select('al.name', 'ag.asignatura', 'al.id','b.semestre','b.grupo')
            ->where('al.id', $alumnoId)
            ->get();

        return view('/alumnos/calificacion',['calificaciones' => $calificaciones]);
    }
    public function calendarioDocente()
    {
        return view('/docentes/calendario');
    }
    public function calendarioAlumno()
    {
        return view('/alumnos/calendario');
    }
    public function boletaAlumno()
    {
    }
    public function detallecalificacion($alumnoid)
    {
        $calificaciondetalle = DB::table('boletas as b')
            ->join('asignaturas as ag', 'b.id_asignatura', '=', 'ag.id')
            ->join('alumnos as al', 'b.id', '=', 'al.id_boleta')
            ->join('calificacions as cl', 'cl.id', '=', 'ag.id_calificacion')
            ->select('al.name', 'ag.asignatura', 'cl.calificacion', 'al.id','b.semestre')
            ->where('al.id', $alumnoid)
            ->get();
        return view('docentes.detalle', ['detalle' => $calificaciondetalle, 'alumnoid' => $alumnoid]);
    }
    public function alumnoDocente()
    {
        $maestro = session('maestro')->name;
        $maestroId = session('maestro')->id;

        $calificaciones = DB::table('boletas as b')
            ->join('asignaturas as ag', 'b.id_asignatura', '=', 'ag.id')
            ->join('alumnos as al', 'b.id', '=', 'al.id_boleta')
            ->select('al.name', 'ag.asignatura', 'al.id','b.semestre','b.grupo')
            ->where('ag.id_maestro', $maestroId)
            ->get();

        return view('docentes.alumnos', ['calificaciones' => $calificaciones], ['maestro' => $maestro]);
    }
    public function calificacionDocente()
    {
        // $maestro = session('maestro')->id;
        // $calificaciones = DB::table('asignaturas')
        // ->where('id_maestro',$maestro)
        // ->get();
        // return view('/docentes/calificacion',['maestro',$maestro]);
        $maestroId = session('maestro')->id;
        $calificaciones = DB::table('boletas as b')
            ->join('asignaturas as ag', 'b.id_asignatura', '=', 'ag.id')
            ->join('alumnos as al', 'b.id', '=', 'al.id_boleta')
            ->select('al.name', 'ag.asignatura', 'al.id')
            ->where('ag.id_maestro', $maestroId)
            ->get();
        return view('docentes.calificacion', ['calificaciones' => $calificaciones]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('inicio'));
    }
}
