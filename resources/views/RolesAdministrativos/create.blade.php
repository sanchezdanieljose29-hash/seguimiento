@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Agregar Rol Administrativo</h1>
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
<form action="{{ route('rolesadministrativos.store') }}" method="POST">
@csrf

<label for="Descripcion">Descripcion</label>
<input type="text" id="Descripcion" name="Descripcion"> <br><br>

</div>

</div>

<div>

    <div class="card-footer text-right">
                    <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary">
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