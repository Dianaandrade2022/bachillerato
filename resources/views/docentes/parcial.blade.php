@extends('layout')
@section('title','Calificaciones')

@section('estilo')
<link rel="stylesheet" href="{{ asset('css/nav2.css') }}">
@endsection

@section('content')
<div class="p-5">
    <a href="{{ route('docentes.detailasignatura',['idAsignatura'=>$calificaciones->first()->idasignatura]) }}" class="hover:text-gray-400 hover:bg-transparent my-3">Volver</a>
    <div class="grid grid-cols-3 gap-4 p-2 shadow-md rounded-lg">
        <div class="col">
            <h1 class="text-xl font-bold mb-2">Grupo</h1>
            <p class="mb-1">{{ $grupo }}</p>
        </div>

        <div class="col">
            <h1 class="text-xl font-bold mb-2">Parcial</h1>
            <div class="grid grid-cols-3">
                <a href="{{ route('docentes.parcial', ['idAsignatura' =>$calificaciones->first()->idasignatura, 'grupo' => $calificaciones->first()->grupo,'parcial'=> 1]) }}" class="hover:text-green-400 hover:bg-transparent">1</a>
                <a href="{{ route('docentes.parcial', ['idAsignatura' =>$calificaciones->first()->idasignatura, 'grupo' => $calificaciones->first()->grupo,'parcial'=> 2]) }}" class="hover:text-green-400 hover:bg-transparent">2</a>
                <a href="{{ route('docentes.parcial', ['idAsignatura' =>$calificaciones->first()->idasignatura, 'grupo' => $calificaciones->first()->grupo,'parcial'=> 3]) }}" class="hover:text-green-400 hover:bg-transparent">3</a>
            </div>
        </div>
        <div class="col">
            <h1 class="text-xl font-bold mb-2">Asignatura</h1>
            <p class="mb-1">{{ $calificaciones->first()->asignatura }}</p>
        </div>
    </div>
    <div class="flex gap-4 p-2 border my-3 rounded-0 shadow-md">
        <div class="col">
            <a class="hover:text-green-400 hover:bg-transparent" href="{{ route('docentes.agregarcalificacion',['idAsignatura'=>$calificaciones->first()->idasignatura ,'grupo'=>$grupo])}}">Agregar calificaciones</a>
        </div>
    </div>
    @if ($message = Session::get('deletemessage'))
    <div class="bg-blue-300 px-4 py-2 rounded-md">
        {{ $message }}
    </div>
    @endif

    @if ($errors->has('deletemessage'))
    <div class="bg-blue-300 px-4 py-2 rounded-md">
        {{ $errors->first('deletemessage') }}
    </div>
    @endif

    <table class="table-auto mt-5">
        <thead>
            <tr>
                <th scope="col" class="px-4 py-2">N°</th>
                <th scope="col" class="px-4 py-2">Nombre del alumno</th>
                <th scope="col" class="px-4 py-2">Calificación</th>
                <th scope="col" class="px-4 py-2">Parcial</th>
                <th scope="col" class="px-4 py-2">Delete</th>
            </tr>
        </thead>
        <tbody>
            @php
            $contador = 1;
            @endphp
            @foreach ($calificaciones as $calificacion)
            <tr>
                <td class="border px-4 py-2">{{ $contador}}</td>
                <td class="border px-4 py-2">{{ $calificacion->name }}</td>
                <td class="border px-4 py-2">{{ $calificacion->calificacion }}</td>
                <td class="border px-4 py-2">{{ $calificacion->parcial }}</td>
                <td class="border px-4 py-2">
                    <form action="{{ route('delete') }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="number" name="idalumno" value="{{$calificacion->idalumno}}" class="hidden">
                        <input type="number" name="idasignatura" value="{{$calificacion->idasignatura}}" class="hidden">
                        <input type="text" name="grupo" value="{{$calificacion->grupo}}" class="hidden">
                        <input type="number" name="parcial" value="{{$calificacion->parcial}}" class="hidden">
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @php
            $contador++
            @endphp
            @endforeach
        </tbody>
    </table>
</div>
@endsection
