@extends('layout')
@section('title','Inicio')

@section('estilo')

<link rel="stylesheet" href="{{asset('css/nav2.css')}}">
@endsection

@section('content')
<div class="p-5">
    <div class="grid grid-cols-2 p-2 shadow-md rounded-lg">
        <div class="col">
            <h1>Nombre</h1>
            <h1>Martínez Andrade Diana</h1>
        </div>
        <div class="col">
            <h1>Promedio general</h1>
            <h1>9.3</h1>
        </div>

        <div class="col">
            <h1>Matricula</h1>
            <h1>a3521110157</h1>
        </div>
        <div class="col">
            <h1>Semestre</h1>
            <h1>4</h1>
        </div>

        <div class="col">
            <h1>Grupo actual</h1>
            <h1>4°B</h1>
        </div>
    </div>
    <table class="table-auto my-2">
        <thead>
            <tr>
                <th scope="col">Materia</th>
                <th scope="col">Profesor</th>
                <th scope="col">Evaluación</th>
                <th scope="col">Cuatrimestre</th>
                <th scope="col">Calificación</th>
            </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
</div>
@endsection
