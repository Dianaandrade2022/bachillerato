@extends('layout')
@section('title','Boletas')

@section('estilo')

<link rel="stylesheet" href="{{asset('css/nav2.css')}}">
@endsection

@section('content')
<div class="m-4">
    <table class="table-auto w-full mb-4 border shadow-md">
        <thead>
            <caption class="border px-4 py-2 border-bottom-0 text-blue-700">Información del Docente</caption>
            <tr>
                <th class="px-4 py-2" >Nombre</th>
                <th class="px-4 py-2">Cantidad de asignaturas</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td class="border px-4 py-2">{{ $maestro }}</td>
                <td class="border px-4 py-2">{{ $asignatura->count() }}</td>
            </tr>
        </tbody>
    </table>
    <table class="table-auto w-full border shadow-md">
        <thead>
            <tr>
                <th class="px-4 py-2">N°</th>
                <th class="px-4 py-2">Asignatura</th>
                <th class="px-4 py-2">Detalles</th>
            </tr>
        </thead>
        <tbody>
            @php $contador = 1; @endphp
            @foreach($asignatura as $dato)
            <tr>
                <td class="border px-4 py-2 text-center">{{ $contador }}</td>
                <td class="border px-4 py-2 text-center">{{ $dato->asignatura }}</td>
                <td class="border px-4 py-2 text-center"><a href="{{ route('docentes.detailasignatura', ['idAsignatura' => $dato->id]) }}" class="hover:text-green-400 hover:bg-transparent">Ver grupos</a></td>
            </tr>
            @php $contador++; @endphp
            @endforeach
        </tbody>
    </table>
</div>

@endsection
