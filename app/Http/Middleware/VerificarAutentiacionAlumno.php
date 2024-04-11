<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class VerificarAutentiacionAlumno
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session('authenticated_alumno')) {
            return redirect()->route('login')->withErrors(['login' => 'Debes iniciar sesión para acceder a esta página']);
        }
        return $next($request);
    }
}
