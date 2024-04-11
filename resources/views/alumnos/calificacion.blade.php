@extends('layout')

@section('title', 'Alumnos')

@section('estilo')
<link rel="stylesheet" href="{{ asset('css/nav2.css') }}">
@endsection

@section('content')
<div class="container mx-auto p-5">
    @if(isset($maestro))
    <h3 class="h3">Alumnos del maestro : {{ $maestro }}</h3>
    @endif
    <table class="table-auto w-full">
        <thead>
            <tr>
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Nombre del alumno</th>
                <th class="px-4 py-2">Asignatura</th>
                <th class="px-4 py-2">semestre</th>
                <th class="px-4 py-2">grupo</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($calificaciones as $index => $calificacion)
            <tr>
                <td class="border px-4 py-2">{{ $calificacion->name }}</td>
                <td class="border px-4 py-2">{{ $calificacion->asignatura }}</td>
                <td class="border px-4 py-2">{{ $calificacion->semestre }}</td>
                <td class="border px-4 py-2">{{ $calificacion->grupo }}</td>
                <td class="border px-4 py-2">{{ $calificacion->grupo }}</td>
                <td class="border px-4 py-2"><a href="{{ route('docentes.detalle', ['alumnoid' => $calificacion->id]) }}" class="hover:text-green-400 hover:bg-transparent">Ver detalles</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
