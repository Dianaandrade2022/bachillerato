
@section('navbar')
    <div class="barraInicio">
    @if (request()->is('inicio')||request()->is('calendario')|| request()->is('info'))
    <div class="navcontain">
    <img src="{{asset('img/logo.png')}}" alt="">
    </div>
    @endif
        <nav>
            <ul>
                <li class="{{ request()->is('inicio') ? 'activo' : '' }}"><a href="{{ route('inicio') }}">Inicio</a></li>
                <li class="{{ request()->is('docentes') ? 'activo' : '' }}"><a href="{{ route('docentes') }}">Docentes</a></li>
                <li class="{{ request()->is('calendario') ? 'activo' : '' }}"><a href="{{ route('calendario') }}">Calendario</a></li>
                <li class="{{ request()->is('login') ? 'iniciar activo' : 'iniciar' }}"><a href="{{ route('login') }}">Alumnos</a></li>
            </ul>
        </nav>
    </div>
@show
