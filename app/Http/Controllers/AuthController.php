<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Usuario;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function cerrarSesion()
    {
        Auth::logout();

        return redirect('/');
    }
}
