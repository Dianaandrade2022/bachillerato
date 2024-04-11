@extends('app')
@section('title','Login')
@section('estilo')
<link rel="stylesheet" href="{{asset('css/nav.css')}}">
<link rel="stylesheet" href="{{asset('css/login.css')}}">
@endsection
<div class="barraInicio">
    @section('navbar')
    @parent
    @endsection
    @section('content')
    <div class="inicio">
        <div class="contenido">
            <img src="{{asset('img/loginAlum.png')}}" alt="" class="">
            <div class="card border-0 p-1">
                <h3 class="titulo">Iniciar Sesión</h3>
                <p>Por favor complete su información a continuación:</p>
                <div class="user my-4">
                    <img src="{{asset('img/user.png')}}" alt="" class="">
                </div>

                <form method="POST" action="{{route('login')}}">

                    @csrf
                    @if ($errors->has('login'))
                    <div class="alert alert-danger w-75">
                        {{ $errors->first('login') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif

                    <div class="correo">
                        @error('correo')
                        <div class="alert alert-danger w-75">{{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @enderror
                        <label for="">Correo</label>
                        <input type="email" name="correo">
                    </div>
                    <br>
                    <div class="pass">
                        @error('password')
                        <div class="alert alert-danger w-75">{{ $message }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        @enderror
                        <label for="">Contraseña</label>
                        <input type="password" name="password">
                    </div>

                    <button class="btn btn-primary mb-3">Enviar</button>
                </form>
                <div class="olvido">
                    <a href="">¿Olvidaste la contraseña?</a>
                </div>
            </div>
        </div>
    </div>
    @endsection
