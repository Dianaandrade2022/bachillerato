@extends('layout')
@section('title','Inicio')

@section('estilo')
<link rel="stylesheet" href="{{asset('css/nav2.css')}}">
@endsection

@section('content')
<div class="container">
    <div class="rounded-md w-fill">

    </div>
    <img src="{{asset('img/inicio1.png')}}" alt="">
    <div class="titulo">
        @if(isset($maestro))
        <h3 class="">Bienvenido Maestro, {{ $maestro->name }}</h3>
        @endif
    </div>
    <div>
    <h3>Bachillerato Digital <br> Núm. 24</h3>
    </div>
    <div class="titulo">
        <p>La escuela Bachillerato General Digital Núm. 24 es una escuela del <br> sector público, de nivel educativo Media Superior y de turno vespertino.</p>
    </div>

</div>
@endsection
