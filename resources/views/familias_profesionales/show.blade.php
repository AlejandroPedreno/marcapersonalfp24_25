@extends('layouts.master')

@section('content')


    <div class="row m-4">

        <div class="col-sm-4">

            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/9/9f/Curriculum-vitae-warning-icon.svg/256px-Curriculum-vitae-warning-icon.svg.png" style="height:200px"/>

        </div>
        <div class="col-sm-8">

            <h3><strong>Nombre</strong> {{ $familiaProfesional->nombre }}</h3>
            <h4>
                <ul>
                    <li><strong>Código:</strong> {{ $familiaProfesional->codigo }}</li>
                </ul>
            </h4>
            <a class="btn btn-warning" href="{{ action([App\Http\Controllers\FamiliaProfesionalController::class, 'getEdit'], ['id' => $familiaProfesional->id]) }}">
                <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                Editar familia profesional
            </a>
            <a class="btn btn-outline-info" href="{{ action([App\Http\Controllers\FamiliaProfesionalController::class, 'getIndex']) }}">
                Volver al listado
            </a>

        </div>
    </div>

@endsection
