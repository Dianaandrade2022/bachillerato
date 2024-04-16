@section('navbar')
@php
$userType = request()->is('docentes/*') ? 'docentes' : 'alumnos';
@endphp

@if ($userType == 'docentes')
<aside class="bg-teal-800 h-screen w-64">
    <div class="h-full items-center justify-start py-4 px-2">
        <img src="{{ asset('img/logo.png') }}" alt="">
        <div class="list-none h-screen sticky">
            <a href="{{ route('docentes.inicio') }}" class="p-4 block text-white text-center shadow-sm">Inicio</a>
            <a href="{{ route('docentes.asignatura') }}" class="p-4 block text-white text-center shadow-sm">Boletas</a>
            <a href="{{ route('docentes.calendario') }}" class="p-4 block text-white text-center shadow-sm">Calendario</a>
            <a href="{{ route('logout') }}" class="p-4 block text-white text-center shadow-sm">Cerrar Sesión</a>
        </div>
    </div>
</aside>
@else
<aside class="bg-teal-800 h-screen w-64">
    <div class="h-full items-center justify-start py-4 px-2">
        <img src="{{ asset('img/logo.png') }}" alt="">
        <div class="list-none h-screen sticky">
            <a href="{{ route('alumnos.inicio') }}" class="p-4 block text-white text-center shadow-sm">Inicio</a>
            <a href="{{ route('alumnos.boleta') }}" class="p-4 block text-white text-center shadow-sm">Boletas</a>
            <a href="{{ route('alumnos.calendario') }}" class="p-4 block text-white text-center shadow-sm">Calendario</a>
            <a href="{{ route('logout') }}" class="p-4 block text-white text-center shadow-sm">Cerrar Sesión</a>
        </div>
    </div>
</aside>
@endif
@show
