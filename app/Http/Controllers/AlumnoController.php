<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Alumno;
use Illuminate\Support\Facades\Redirect;

class AlumnoController extends Controller
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
        $usuario = Alumno::where('correo', $correo)->first();

        if ($usuario) {
            if (Hash::check($password, $usuario->password)) {
                $alumno = DB::table('alumnos')->where('id', $usuario->id)->first();
                session(['authenticated_alumno' => true,'alumno'=>$alumno]);
                if ($alumno) {
                    return Redirect::route('alumnos.inicio');
                } else {
                    return redirect()->route('login')->withErrors(['login' => 'Datos incorrectos']);
                }
            } else {
                return redirect()->route('login')->withErrors(['login' => 'Credenciales incorrectas']);
            }
        } else {
            return redirect()->route('login')->withErrors(['login' => 'Credenciales incorrectas']);
        }
    }
}
