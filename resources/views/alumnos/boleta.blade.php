@extends('layout')
@section('title','Calificaciones')

@section('estilo')
<link rel="stylesheet" href="{{ asset('css/nav2.css') }}">
@endsection

@section('content')
<div class="p-5">
    <a href="{{ route('alumnos.inicio') }}" class="hover:text-gray-400 hover:bg-transparent my-3">Volver</a>
    <div class="grid grid-cols-3 gap-4 p-2 shadow-md rounded-lg">
        <div class="col">
            <h1 class="text-xl font-bold mb-2">Grupo</h1>
            <p class="mb-1">{{ $grupo }}</p>
        </div>


        <div class="col">
            <h1 class="text-xl font-bold mb-2">Nombre del alumno</h1>
            <p class="mb-1">{{ $calificaciones->first()->name }}</p>
        </div>
    </div>


    <table class="table-auto mt-5">
        <thead>
            <tr>
                <th scope="col" class="px-4 py-2">N°</th>
                <th scope="col" class="px-4 py-2">Asignatura</th>
                <th scope="col" class="px-4 py-2">Calificación</th>
                <th scope="col" class="px-4 py-2">Parcial</th>
            </tr>
        </thead>
        <tbody>
            @php
            $contador = 1;
            @endphp
            @foreach ($calificaciones as $calificacion)
            <tr>
                <td class="border px-4 py-2">{{ $contador}}</td>
                <td class="border px-4 py-2">{{ $calificacion->asignatura }}</td>
                <td class="border px-4 py-2">{{ $calificacion->calificacion }}</td>
                <td class="border px-4 py-2">{{ $calificacion->parcial }}</td>
            </tr>
            @php
            $contador++
            @endphp
            @endforeach

        </tbody>
    </table>
</div>
@endsection
