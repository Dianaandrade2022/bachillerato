@extends('layout')
@section('title','Asignaturas')

@section('estilo')
<link rel="stylesheet" href="{{ asset('css/nav2.css') }}">
@endsection

@section('content')
<div class="p-5">
    <a href="{{ route('docentes.asignatura') }}" class="hover:text-gray-400 hover:bg-transparent">Volver</a>
    <div class="grid grid-cols-2 gap-4 px-4 py-2 shadow-md rounded-lg">
        <div class="col">
            <h1 class="text-xl font-bold mb-2">Materia</h1>
            <p class="mb-1">{{$maestro}}</p>
        </div>

        <div class="col">
            <h1 class="text-xl font-bold mb-2">Maestro</h1>
            <p class="mb-1">{{$asignatura}}</p>
        </div>
    </div>

    <table class="table-auto mt-5">
        <thead>
            <tr>
                <th scope="col" class="border px-4 py-2">Semestre</th>
                <th scope="col" class="border px-4 py-2">Grupo</th>
                <th scope="col" class="border px-4 py-2">Parcial</th>
            </tr>
        </thead>
        <tbody>
            @php
                $parcialdefault = 1
            @endphp
            @foreach ($detalleasig as $dato)
            <tr>
                <td class="border px-4 py-2">{{ $dato->semestre }}</td>
                <td class="border px-4 py-2">{{ $dato->grupo }}</td>
                <td class="border px-4 py-2"><a href="{{ route('docentes.calificacion', ['idAsignatura' => $dato->id, 'grupo' => $dato->grupo]) }}" class="hover:text-green-400 hover:bg-transparent">Ver Calificaciones</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
