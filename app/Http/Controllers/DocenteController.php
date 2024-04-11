<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Maestro;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


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
                session(['authenticated_docente' => true,'maestro'=>$maestro]);
                if ($maestro) {
                    return view('docentes.inicio', ['maestro' => $maestro]);
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
}
