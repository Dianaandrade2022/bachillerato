@extends('app')
@section('title','Calendario')

@section('estilo')
<link rel="stylesheet" href="{{asset('css/nav2.css')}}">
<link rel="stylesheet" href="{{asset('css/calendario.css')}}">
@endsection
@section('navbar')
@parent

@endsection
@section('content')
<div class="contenido">
    <p>Calendario Escolar</p>
    <div>
    <img src="{{ asset('img/FsJSyj9TOr-Calendario-Escolar-2023-2024-90x60.jpg') }}" alt="">
    </div>
</div>
@endsection
