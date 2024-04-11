@section('navbar')
@if (request()->is('docentes/inicio'))
<aside class="bg-teal-800 h-full w-64">
    <div class="h-full items-center justify-start py-4 px-2">
        <img src="{{asset('img/logo.png')}}" alt="">
        <div class="list-none h-screen sticky">
            <a href="{{ route('docentes.inicio') }}" class="p-4 block text-white text-center shadow-sm">Inicio</a>
            <a href="{{ route('docentes.alumnos') }}" class="p-4 block text-white text-center shadow-sm">Alumnos</a>
            <a href="{{ route('docentes.alumnos') }}" class="p-4 block text-white text-center shadow-sm">Alumnos</a>
            <a href="{{ route('docentes.calendario') }}" class="p-4 block text-white text-center shadow-sm">Calendario</a>
            <a href="{{ route('logout') }}" class="p-4 block text-white text-center shadow-sm">Cerrar Sesion</a>
        </div>
    </div>
</aside>
@else
<aside class="bg-teal-800 h-full w-64">
    <div class="h-full items-center justify-start py-4 px-2">
        <img src="{{asset('img/logo.png')}}" alt="">
        <div class="list-none h-screen sticky">
            <a href="{{ route('alumnos.inicio') }}" class="p-4 block text-white text-center shadow-sm">Inicio</a>
            <a href="{{route('alumnos.calificacion')}}" class="p-4 block text-white text-center shadow-sm">Calificaciones</a>
            <a href="{{ route('alumnos.calendario') }}" class="p-4 block text-white text-center shadow-sm">Calendario</a>
            <a href="{{ route('logout') }}" class="p-4 block text-white text-center shadow-sm">Cerrar Sesion</a>
        </div>
    </div>
</aside>
@endif

@show
