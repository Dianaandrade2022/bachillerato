@extends('layout')

@section('title', 'Agregar calificaciones')

@section('estilo')
<link rel="stylesheet" href="{{ asset('css/nav2.css') }}">
@endsection

@section('content')
<div class="container mx-auto p-5">
    <h1 class="text-3xl font-bold mb-5">Agregar Calificaciones</h1>

    <form action="{{ route('docentes.guardar') }}" method="POST">
        @csrf
        @if ($message = Session::get('successmessage'))
        <div class="bg-blue-300 px-4 py-2 rounded-md my-2 ">
            {{ $message }}
        </div>
        @endif

        @if ($message = Session::get('errormessage'))
        <div class="bg-red-300 px-4 py-2 rounded-md my-2 ">
            {{ $message }}
        </div>
        @endif

        <div class="container mx-auto p-5">
            <input type="number" name="parcial" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-400" placeholder="Parcial" required>
            <table class="table-auto mt-5">
                <thead>
                    <tr>
                        <th scope="col" class="px-4 py-2">N°</th>
                        <th scope="col" class="px-4 py-2">Nombre del alumno</th>
                        <th scope="col" class="px-4 py-2">Calificación</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $contador = 1;
                    @endphp
                    @foreach ($parcial1 as $calificacion)
                    <tr>
                        <td class="border px-4 py-2">{{ $contador}}</td>
                        <td class="border px-4 py-2">{{ $calificacion->name }}</td>
                        <td> <input type="number" step="0.01" name="calificaciones[{{ $calificacion->idcalificacion }}]" class="w-full px-4 py-2 rounded-lg border border-gray-300 focus:outline-none focus:border-blue-400" placeholder="calificación" required>
                        </td>
                    </tr>
                    @php
                    $contador++
                    @endphp
                    @endforeach
                </tbody>
            </table>
        </div>

        <button type="submit" class="mt-5 px-6 py-3 bg-blue-500 text-white rounded-md shadow-md hover:bg-blue-600">Guardar Calificaciones</button>
    </form>
</div>
@endsection
