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
        $alumno = session('alumno')->name;
        $alumnoId = session('alumno')->id;

        $calificaciones = DB::table('boletas as b')
            ->join('asignaturas as ag', 'b.id_asignatura', '=', 'ag.id')
            ->join('alumnos as al', 'b.id', '=', 'al.id_boleta')
            ->select('al.name', 'ag.asignatura', 'al.id', 'b.semestre', 'b.grupo')
            ->where('al.id', $alumnoId)
            ->get();

        return view('/alumnos/calificacion', ['calificaciones' => $calificaciones]);
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
        $alumnoId = session('alumno')->id;

        $calificaciones = DB::table('alumnos as al')
        ->select('al.grupo', 'ag.semestre', 'ag.asignatura', 'ag.id as idasignatura', 'cl.parcial', 'al.id as idalumno', 'cl.calificacion', 'al.name')
        ->join('alumnohas_c_s as hc', 'al.id', '=', 'hc.id_alumno')
        ->join('calificacions as cl', 'hc.id_calificacion', '=', 'cl.id')
        ->join('boletas as b', 'b.id', '=', 'al.id_boleta')
        ->join('asignaturas as ag', 'ag.id', '=', 'cl.id_asignatura')
        ->where('al.id', $alumnoId)
        ->get();

        return view('alumnos.boleta', ['calificaciones' => $calificaciones, 'grupo' => $calificaciones->first()->grupo]);
    }
    public function detallecalificacion($alumnoid)
    {
        $calificaciondetalle = DB::table('boletas as b')
            ->join('asignaturas as ag', 'b.id_asignatura', '=', 'ag.id')
            ->join('alumnos as al', 'b.id', '=', 'al.id_boleta')
            ->join('calificacions as cl', 'cl.id', '=', 'ag.id_calificacion')
            ->select('al.name', 'ag.asignatura', 'cl.calificacion', 'al.id', 'b.semestre')
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
            ->select('al.name', 'ag.asignatura', 'al.id', 'b.semestre', 'b.grupo')
            ->where('ag.id_maestro', $maestroId)
            ->get();
        return view('docentes.alumnos', ['calificaciones' => $calificaciones, 'maestro' => $maestro]);
    }

    public function asignaturaDocente()
    {
        $maestro = session('maestro')->name;
        $maestroId = session('maestro')->id;

        $asignatura = DB::table('asignaturas as ag')
            ->select('ag.asignatura', 'ag.id')
            ->join('maestros as mt', 'ag.id_maestro', '=', 'mt.id')
            ->where('mt.id', $maestroId)
            ->get();
        return view('docentes.asignatura', ['asignatura' => $asignatura, 'maestro' => $maestro]);
    }

    public function detailasignatura($idasignatura)
    {
        $maestroid = session('maestro')->id;
        $maestro = session('maestro')->name;

        $asignatura = DB::table('asignaturas as ag')
            ->select('asignatura')
            ->where('ag.id', $idasignatura)
            ->first();

        $detalleasignatura = DB::table('asignaturas as ag')
            ->select('al.grupo', 'ag.semestre', 'ag.asignatura', 'ag.id')
            ->join('boletas as b', 'ag.id', '=', 'b.id_asignatura')
            ->join('alumnos as al', 'b.id', '=', 'al.id_boleta')
            ->where('ag.id_maestro', $maestroid)
            ->where('ag.id', $idasignatura)
            ->groupBy('al.grupo', 'ag.semestre', 'ag.asignatura', 'ag.id')
            ->get();
        return view('docentes.detailasignatura', ['detalleasig' => $detalleasignatura, 'asignatura' => $asignatura->asignatura, 'maestro' => $maestro]);
    }
    public function calificacionDocente($idAsignatura, $grupo)
    {
        $maestroId = session('maestro')->id;

        $calificaciones = DB::table('calificacions as cl')
        ->select('al.grupo', 'ag.semestre', 'ag.asignatura', 'ag.id as idasignatura', 'cl.parcial', 'cl.calificacion', 'cl.id as idcalif','al.name','al.id as idalumno','cl.id as idcalificacion')
        ->join('asignaturas as ag', 'ag.id', '=', 'cl.id_asignatura')
        ->join('boletas as b', 'ag.id', '=', 'b.id_asignatura')
        ->join('alumnos as al', 'al.id_boleta', '=', 'b.id')
        ->where('ag.id_maestro', $maestroId)
        ->where('al.grupo', $grupo)
        ->where('cl.parcial', 1)
        ->orderBy('cl.calificacion')
        ->get();

        return view('docentes.calificacion', ['calificaciones' => $calificaciones, 'grupo' => $grupo, 'idAsignatura' => $idAsignatura]);
    }

    public function putcalificacion($idAsignatura, $grupo)
    {
        $maestroId = session('maestro')->id;


        $parcial1 = DB::table('asignaturas as ag')
        ->select('al.grupo', 'ag.semestre', 'cl.calificacion', 'al.id as idalumno', 'al.name', 'ag.asignatura', 'cl.parcial','ag.id as idasignatura','cl.id as idcalificacion')
        ->join('boletas as b', 'b.id_asignatura', '=', 'ag.id')
        ->join('alumnos as al', 'al.id_boleta', '=', 'b.id')
        ->join('calificacions as cl', 'ag.id', '=', 'cl.id_asignatura')
        ->join('maestros as mt', 'mt.id', '=', 'ag.id_maestro')
        ->where('ag.id_maestro', $maestroId)
        ->where('ag.id', $idAsignatura)
        ->where('al.grupo', $grupo)
        ->where('cl.parcial',1)
        ->get();

        return view('docentes.agregarcalificacion', ['parcial1' => $parcial1]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('inicio'));
    }
    public function detalleparcial($idAsignatura, $grupo, $parcial)
    {
        $maestroId = session('maestro')->id;

        $calificaciones = DB::table('asignaturas as ag')
        ->select('al.grupo', 'ag.semestre', 'cl.calificacion', 'al.id as idalumno', 'al.name', 'ag.asignatura', 'cl.parcial','ag.id as idasignatura')
        ->join('boletas as b', 'b.id_asignatura', '=', 'ag.id')
        ->join('alumnos as al', 'al.id_boleta', '=', 'b.id')
        ->join('calificacions as cl', 'ag.id', '=', 'cl.id_asignatura')
        ->where('ag.id_maestro', $maestroId)
        ->where('ag.id', $idAsignatura)
        ->where('al.grupo', $grupo)
        ->where('cl.parcial',$parcial)
        ->distinct()
        ->get();

    return view('docentes.parcial', ['calificaciones' => $calificaciones, 'grupo' => $grupo, 'idAsignatura' => $idAsignatura]);
    }
}
