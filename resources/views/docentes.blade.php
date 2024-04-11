@extends('app')
@section('title','Docentes')

@section('estilo')
<link rel="stylesheet" href="{{asset('css/nav.css')}}">
<link rel="stylesheet" href="{{asset('css/docentes.css')}}">
@endsection
<div class="barraInicio">
    @section('navbar')
    @parent
    @endsection
    @section('content')
    <div class="inicio">
        <div class="contenido">
            <img src="{{asset('img/loginDocen.png')}}" alt="">
            <div class="card border-0">
                <h3 class="titulo">Bienvenido Docente</h3>
                <p>Inicie Sesión</p>

                <form method="POST" action="{{route('docentes')}}">
                    @csrf
                    @if ($errors->has('login'))
                    <div class="alert alert-danger w-50">
                        {{ $errors->first('login') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="correo">
                        @error('correo')
                        <div class="alert alert-danger w-50">{{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @enderror
                        <input type="email" name="correo" placeholder="Correo">

                    </div>
                    <br>
                    <div class="pass">
                        @error('password')
                        <div class="alert alert-danger w-50">{{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @enderror
                        <input type="password" name="password" placeholder="Contraseña">
                    </div>
                    <button type="submit" class="btn btn-info">Enviar</button>

                </form>
                <div class="olvido mt-4">
                    <a href="">¿Olvidaste la contraseña?</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
