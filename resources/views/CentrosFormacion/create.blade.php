@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Agregar nuevo centro de formación</h1>
<br>

@if ($errors->any())
<div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <ul class="mb-0">
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<div class="card">
    <div class="card-header">
        <form action="{{ route('centrosformacion.store') }}" method="POST">
            @csrf

            <label for="codigo">Código</label>
            <input type="text" id="codigo" name="codigo"> <br><br>

            <label for="Denominacion">Denominacion</label>
            <input type="text" id="Denominacion" name="Denominacion"> <br><br>

            <label for="Direccion">Dirección</label>
            <input type="text" id="Direccion" name="Direccion"> <br><br>

            <label for="Observaciones">Observaciones</label>
            <input type="text" id="Observaciones" name="Observaciones"> <br><br>

            <label for="tblregionales_NIS">Regional</label>
            <input type="text" id="tblregionales_NIS" name="tblregionales_NIS"> <br><br>


    </div>

</div>

<div>

    <div class="card-footer text-right">
        <a href="{{ route('centrosformacion.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>

        <button type="submit" class="btn btn-success">
            <i class="fas fa-save"></i> Guardar centro de formación
        </button>

    </div>

    </form>

    @stop

    @section('content')

    @stop