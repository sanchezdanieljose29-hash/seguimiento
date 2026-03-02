@extends('adminlte::page')

@section('title', 'Crear aprendiz')

@section('content_header')
<h1 class="m-0 text-dark">Actualizar Aprendiz</h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        {{-- Card --}}
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-map-marked-alt"></i>
                    Datos del dentro del aprendiz
                </h3>
            </div>

            <form action="{{ route('aprendices.update', $aprendices->NIS) }}" method="POST">
                @csrf
                @method('PUT')



                <div class="card-body">

                    {{-- Nombres --}}
                    <div class="form-group">
                        <label for="Nombres">
                            <i class="fas fa-user"></i>
                            Nombres
                        </label>
                        <input type="text"
                            id="Nombres"
                            name="Nombres"
                            class="form-control"
                            placeholder="Ingrese al aprendiz"
                            value="{{ old('Nombres' , $aprendices->Nombres) }}">
                    </div>

                    {{-- Apellidos --}}
                    <div class="form-group">
                        <label for="Apellidos">
                            <i class="fas fa-user"></i>
                            Apellidos
                        </label>
                        <input type="text"
                            id="Apellidos"
                            name="Apellidos"
                            class="form-control"
                            placeholder="Ingrese los apellidos del aprendiz"
                            value="{{ old('Apellidos' , $aprendices->Apellidos) }}">
                    </div>

                    {{-- Tipo de documentos --}}
                    <div class="form-group">
                        <label for="tbltiposdocumentos_NIS">
                            <i class="fas fa-building"></i>
                            Tipos de documento
                        </label>
                        <input type="text"
                            id="tbltiposdocumentos_NIS"
                            name="tbltiposdocumentos_NIS"
                            class="form-control"
                            placeholder="Ingrese el tipo de documento del aprendiz"
                            value="{{ old('tbltiposdocumentos_NIS' , $aprendices->tbltiposdocumentos_NIS) }}">
                    </div>

                    {{-- Número de documento --}}
                    <div class="form-group">
                        <label for="Ndoc">
                            <i class="fas fa-building"></i>
                            Número de documento
                        </label>
                        <input type="text"
                            id="Ndoc"
                            name="Ndoc"
                            class="form-control"
                            placeholder="Ingrese el número de documento"
                            value="{{ old('Ndoc' , $aprendices->Ndoc) }}">
                    </div>

                    {{-- Direccion --}}
                    <div class="form-group">
                        <label for="Direccion">
                            <i class="fas fa-building"></i>
                            Dirección
                        </label>
                        <input type="text"
                            id="Direccion"
                            name="Direccion"
                            class="form-control"
                            placeholder="Ingrese las observaciones"
                            value="{{ old('Direccion' , $aprendices->Direccion) }}">
                    </div>

                    {{-- Telefono --}}
                    <div class="form-group">
                        <label for="Telefono">
                            <i class="fas fa-building"></i>
                            Teléfono
                        </label>
                        <input type="text"
                            id="Telefono"
                            name="Telefono"
                            class="form-control"
                            placeholder="Ingrese el teléfono del aprendiz"
                            value="{{ old('Telefono' , $aprendices->Telefono) }}">
                    </div>


                    {{-- CorreoInstitucional --}}
                    <div class="form-group">
                        <label for="CorreoInstitucional">
                            <i class="fas fa-building"></i>
                            Correo institucional
                        </label>
                        <input type="text"
                            id="CorreoInstitucional"
                            name="CorreoInstitucional"
                            class="form-control"
                            placeholder="Ingrese el correo institucional del aprendiz"
                            value="{{ old('CorreoInstitucional' , $aprendices->CorreoInstitucional) }}">
                    </div>

                    {{-- CorreoPersonal --}}
                    <div class="form-group">
                        <label for="CorreoPersonal">
                            <i class="fas fa-building"></i>
                            Correo personal
                        </label>
                        <input type="text"
                            id="CorreoPersonal"
                            name="CorreoPersonal"
                            class="form-control"
                            placeholder="Ingrese el correo personal del aprendiz"
                            value="{{ old('CorreoPersonal' , $aprendices->CorreoPersonal) }}">
                    </div>

                    {{-- Sexo --}}
                    <div class="form-group">
                        <label for="Sexo">
                            <i class="fas fa-building"></i>
                            Sexo
                        </label>
                        <input type="text"
                            id="Sexo"
                            name="Sexo"
                            class="form-control"
                            placeholder="Ingrese el sexo del aprendiz"
                            value="{{ old('Sexo' , $aprendices->Sexo) }}">
                    </div>

                    {{-- FechaNac --}}
                    <div class="form-group">
                        <label for="FechaNac">
                            <i class="fas fa-building"></i>
                            Fecha de nacimiento
                        </label>
                        <input type="text"
                            id="FechaNac"
                            name="FechaNac"
                            class="form-control"
                            placeholder="Ingrese la fecha de nacimiento del aprendiz"
                            value="{{ old('FechaNac' , $aprendices->FechaNac) }}">
                    </div>

                    {{-- EPS --}}
                    <div class="form-group">
                        <label for="tbleps_NIS">
                            <i class="fas fa-building"></i>
                            Seleccione la EPS
                        </label>
                        <input type="text"
                            id="tbleps_NIS"
                            name="tbleps_NIS"
                            class="form-control"
                            placeholder="Ingrese la EPS del aprendiz"
                            value="{{ old('tbleps_NIS' , $aprendices->tbleps_NIS) }}">
                    </div>

                </div>

                {{-- Footer --}}
                <div class="card-footer text-right">
                    <a href="{{ route('aprendices.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>
<br>
<br>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Actualizar Aprendiz
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

{{-- Mensaje de éxito --}}
@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

@endsection