<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Maestro;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class DocenteController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'correo' => 'required|email',
            'password' => 'required'
        ], [
            'correo.required' => 'El campo correo es obligatorio.',
            'correo.email' => 'El campo correo debe ser una dirección de correo electrónico válida.',
            'password.required' => 'El campo contraseña es obligatorio.',
        ]);

        $correo = $request->correo;
        $password = $request->password;

        $usuario = Maestro::where('correo', $correo)->first();

        if ($usuario) {
            if (Hash::check($password, $usuario->password)) {
                $maestro = DB::table('maestros')->where('id', $usuario->id)->first();
                session(['authenticated_docente' => true, 'maestro' => $maestro]);
                if ($maestro) {
                    return Redirect::route('docentes.inicio');
                } else {
                    return redirect()->route('docentes')->withErrors(['login' => 'Datos incorrectos']);
                }
            } else {
                return redirect()->route('docentes')->withErrors(['login' => 'Credenciales incorrectas']);
            }
        } else {
            return redirect()->route('docentes')->withErrors(['login' => 'Credenciales incorrectas']);
        }
    }
    public function guardarcalificaciones(Request $request){
        try {
            // Obtener los datos del formulario
            $parcial = $request->input('parcial');
            $calificaciones = $request->input('calificaciones');

            // Validar que se hayan recibido las calificaciones
            if (!isset($calificaciones) || empty($calificaciones)) {
                return back()->with('errormessage', 'No se recibieron calificaciones.');
            }

            // Recorrer las calificaciones y guardarlas en la base de datos
            foreach ($calificaciones as $id_calificacion => $calificacion) {
                DB::table('calificacions')
                    ->where('id', $id_calificacion)
                    ->update([
                        'calificacion' => $calificacion,
                        'parcial' => $parcial
                    ]);
            }

            return back()->with('successmessage', 'Calificaciones guardadas exitosamente.');
        } catch (\Throwable $th) {
            return back()->with('errormessage', 'Ha ocurrido un error al intentar guardar las calificaciones.');
        }
    }

    public function eliminarcalificacion(Request $request)
    {
        try {
            $maestroId = session('maestro')->id;

            $idalumno = $request->input('idalumno');
            $idasignatura = $request->input('idasignatura');
            $grupo = $request->input('grupo');
            $parcial = $request->input('parcial');

            $delete = DB::table('alumnohas_c_s')
                ->whereIn('id_alumno', function ($query) use ($maestroId, $idalumno, $idasignatura, $grupo, $parcial) {
                    $query->select('al.id')
                        ->from('asignaturas as ag')
                        ->join('boletas as b', 'ag.id', '=', 'b.id_asignatura')
                        ->join('alumnos as al', 'al.id_boleta', '=', 'b.id')
                        ->join('alumnohas_c_s as cs', 'al.id', '=', 'cs.id_alumno')
                        ->join('calificacions as cl', 'cl.id', '=', 'cs.id_calificacion')
                        ->where('ag.id_maestro', $maestroId)
                        ->where('ag.id', $idasignatura)
                        ->where('parcial', $parcial)
                        ->where('al.grupo', $grupo)
                        ->where('al.id', $idalumno);
                })
                ->delete();

            if ($delete) {
                return back()->with('deletemessage', 'Calificación eliminada exitosamente.');
            } else {
                return back()->with('deletemessage', 'Calificación eliminada exitosamente.');
            }
        } catch (\Throwable $th) {
            return back()->with('deletemessage', 'Ha ocurrido un error al intentar eliminar la calificación.');
        }
    }
}
