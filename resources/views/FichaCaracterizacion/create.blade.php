@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Agregar nueva ficha</h1>
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
<form action="{{ route('fichasdecaracterizacion.store') }}" method="POST">
@csrf

<label for="codigo">Código</label>
<input type="text" id="codigo" name="codigo"> <br><br>

<label for="Denominacion">Denominacion</label>
<input type="text" id="Denominacion" name="Denominacion"> <br><br>

<label for="Cupo">Cupo</label>
<input type="text" id="Cupo" name="Cupo"> <br><br>

<label for="FechaInicio">Fecha de inicio</label>
<input type="text" id="FechaInicio" name="FechaInicio"> <br><br>

<label for="FechaFin">Fecha Fin</label>
<input type="text" id="FechaFin" name="FechaFin"> <br><br>

<label for="Direccion">Direccion</label>
<input type="text" id="Direccion" name="Direccion"> <br><br>

<label for="Observaciones">Observaciones</label>
<input type="text" id="Observaciones" name="Observaciones"> <br><br>

<label for="tblprogramasdeformacion_NIS">Pograma de formación</label>
<input type="text" id="tblprogramasdeformacion_NIS" name="tblprogramasdeformacion_NIS"> <br><br>

<label for="tblcentrosdeformacion_NIS">Centro de formación</label>
<input type="text" id="tblcentrosdeformacion_NIS" name="tblcentrosdeformacion_NIS"> <br><br>

</div>

</div>

<div>

    <div class="card-footer text-right">
                    <a href="{{ route('fichasdecaracterizacion.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>

    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Guardar Rol
                    </button>
    
</div>

</form>

@stop

@section('content')
    
@stop