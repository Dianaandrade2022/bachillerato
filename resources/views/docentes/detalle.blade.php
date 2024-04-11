@extends('layout')
@section('title','Calificaciones')

@section('estilo')
<link rel="stylesheet" href="{{ asset('css/nav2.css') }}">
@endsection

@section('content')
<div class="p-5">
<a href="{{ route('docentes.alumnos') }}" class="hover:text-gray-400 hover:bg-transparent my-3">Volver</a>
    <div class="grid grid-cols-2 gap-4 p-2 shadow-md rounded-lg">
        <div class="col">
            <h1 class="text-xl font-bold mb-2">Nombre</h1>
            @foreach ($detalle as $calificacion)
            <p class="mb-1">{{ $calificacion->name }}</p>
            @endforeach
        </div>

        <div class="col">
            <h1 class="text-xl font-bold mb-2">Parcial</h1>
            <p class="mb-1">1</p> <!-- Aquí necesitas obtener la información del parcial -->
        </div>
    </div>

    <table class="table-auto mt-5">
        <thead>
            <tr>
                <th scope="col" class="px-4 py-2">Materia</th>
                <th scope="col" class="px-4 py-2">Semestre</th>
                <th scope="col" class="px-4 py-2">Calificación</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($detalle as $calificacion)
            <tr>
                <td class="border px-4 py-2">{{ $calificacion->asignatura }}</td>
                <td class="border px-4 py-2">{{ $calificacion->semestre }}</td>
                <td class="border px-4 py-2">{{ $calificacion->calificacion }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
