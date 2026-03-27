@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Registrar tu información personal</h1>   
@stop

@section('content')

<form action="{{ route('aprendiz.completar-perfil.store') }}" method="POST">
    @csrf
    @method('PUT')

    <div class="card">
        <div class="card-body">

            {{-- Usuario --}}
            <div class="form-group">
                <label for="Usuarios_NIS">Usuario</label>
                <input type="text"
                    id="Usuarios_NIS"
                    name="Usuarios_NIS"
                    class="form-control"
                    value="{{ old('Usuarios_NIS', $aprendices->Usuarios_NIS) }}">
            </div>

            {{-- Ficha --}}
            <div class="form-group">
                <label for="Ficha_NIS">Ficha</label>
                <select id="Ficha_NIS" name="Ficha_NIS" class="form-control">
                    <option value="">Seleccione una ficha</option>
                    <option value="1" {{ old('Ficha_NIS', $aprendices->Ficha_NIS) == '1' ? 'selected' : '' }}>Ficha 1</option>
                    <option value="2" {{ old('Ficha_NIS', $aprendices->Ficha_NIS) == '2' ? 'selected' : '' }}>Ficha 2</option>
                    <option value="3" {{ old('Ficha_NIS', $aprendices->Ficha_NIS) == '3' ? 'selected' : '' }}>Ficha 3</option>
                </select>
            </div>

            {{-- Dirección --}}
            <div class="form-group">
                <label for="Direccion">Dirección</label>
                <input type="text"
                    id="Direccion"
                    name="Direccion"
                    class="form-control"
                    value="{{ old('Direccion', $aprendices->Direccion) }}">
            </div>

            {{-- Teléfono --}}
            <div class="form-group">
                <label for="Telefono">Teléfono</label>
                <input type="text"
                    id="Telefono"
                    name="Telefono"
                    class="form-control"
                    value="{{ old('Telefono', $aprendices->Telefono) }}">
            </div>

            {{-- Correo institucional --}}
            <div class="form-group">
                <label for="CorreoInstitucional">Correo institucional</label>
                <input type="text"
                    id="CorreoInstitucional"
                    name="CorreoInstitucional"
                    class="form-control"
                    value="{{ old('CorreoInstitucional', $aprendices->CorreoInstitucional) }}">
            </div>

            {{-- Sexo --}}
            <div class="form-group">
                <label for="Sexo">Sexo</label>
                <input type="text"
                    id="Sexo"
                    name="Sexo"
                    class="form-control"
                    value="{{ old('Sexo', $aprendices->Sexo) }}">
            </div>

            {{-- Fecha de nacimiento --}}
            <div class="form-group">
                <label for="FechaNac">Fecha de nacimiento</label>
                <input type="date"
                    id="FechaNac"
                    name="FechaNac"
                    class="form-control"
                    value="{{ old('FechaNac', $aprendices->FechaNac) }}">
            </div>

            {{-- EPS --}}
<div class="form-group">
    <label for="EPS_NIS">
        <i class="fas fa-hospital"></i>
        EPS
    </label>
    <input type="text"
        id="tbleps_NIS"
        name="tbleps_NIS"
        class="form-control"
        placeholder="Ingrese la EPS"
        value="{{ old('EPS_NIS', $aprendices->EPS_NIS) }}">
</div>

        </div>

        {{-- Footer --}}
        <div class="card-footer text-right">
            <button type="submit" class="btn btn-primary">Subir</button>
        </div>
    </div>
</form>

@stop