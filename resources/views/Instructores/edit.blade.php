@extends('adminlte::page')

@section('title', 'Crear Regional')

@section('content_header')
    <h1 class="m-0 text-dark">Actualizar Regional</h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        {{-- Card --}}
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-map-marked-alt"></i>
                    Datos del instructor
            </div>

            <form action="{{ route('instructores.update', $instructores->NIS) }}" method="POST">
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
        placeholder="Ingrese los nombres"
        value="{{ old('Nombres', $instructores->Nombres) }}">
</div>

{{-- Apellidos --}}
<div class="form-group">
    <label for="Apellidos">
        <i class="fas fa-user-tag"></i>
        Apellidos
    </label>
    <input type="text"
        id="Apellidos"
        name="Apellidos"
        class="form-control"
        placeholder="Ingrese los apellidos"
        value="{{ old('Apellidos', $instructores->Apellidos) }}">
</div>
{{-- Tipo de Documento --}}
<div class="form-group">
    <label for="tbltiposdocumentos_NIS">
        <i class="fas fa-file-alt"></i>
        Tipo de Documento
    </label>
    <input type="text"
        id="tbltiposdocumentos_NIS"
        name="tbltiposdocumentos_NIS"
        class="form-control"
        placeholder="Ingrese el tipo de documento"
        value="{{ old('tbltiposdocumentos_NIS', $instructores->tbltiposdocumentos_NIS) }}">
</div>

{{-- Número de Documento --}}
<div class="form-group">
    <label for="Ndoc">
        <i class="fas fa-hashtag"></i>
        Número de Documento
    </label>
    <input type="text"
        id="Ndoc"
        name="Ndoc"
        class="form-control"
        placeholder="Ingrese el número de documento"
        value="{{ old('Ndoc', $instructores->Ndoc) }}">
</div>

{{-- Dirección --}}
<div class="form-group">
    <label for="Direccion">
        <i class="fas fa-map-marker-alt"></i>
        Dirección
    </label>
    <input type="text"
        id="Direccion"
        name="Direccion"
        class="form-control"
        placeholder="Ingrese la dirección"
        value="{{ old('Direccion', $instructores->Direccion) }}">
</div>

{{-- Teléfono --}}
<div class="form-group">
    <label for="Telefono">
        <i class="fas fa-phone"></i>
        Teléfono
    </label>
    <input type="text"
        id="Telefono"
        name="Telefono"
        class="form-control"
        placeholder="Ingrese el teléfono"
        value="{{ old('Telefono', $instructores->Telefono) }}">
</div>

{{-- Correo Institucional --}}
<div class="form-group">
    <label for="CorreoInstitucional">
        <i class="fas fa-envelope"></i>
        Correo Institucional
    </label>
    <input type="email"
        id="CorreoInstitucional"
        name="CorreoInstitucional"
        class="form-control"
        placeholder="Ingrese el correo institucional"
        value="{{ old('CorreoInstitucional', $instructores->CorreoInstitucional) }}">
</div>

{{-- Correo Personal --}}
<div class="form-group">
    <label for="CorreoPersonal">
        <i class="fas fa-envelope-open"></i>
        Correo Personal
    </label>
    <input type="email"
        id="CorreoPersonal"
        name="CorreoPersonal"
        class="form-control"
        placeholder="Ingrese el correo personal"
        value="{{ old('CorreoPersonal', $instructores->CorreoPersonal) }}">
</div>

{{-- Sexo --}}
<div class="form-group">
    <label for="Sexo">
        <i class="fas fa-venus-mars"></i>
        Sexo
    </label>
    <input type="text"
        id="Sexo"
        name="Sexo"
        class="form-control"
        placeholder="Ingrese el sexo"
        value="{{ old('Sexo', $instructores->Sexo) }}">
</div>

{{-- Fecha de Nacimiento --}}
<div class="form-group">
    <label for="FechaNac">
        <i class="fas fa-calendar"></i>
        Fecha de Nacimiento
    </label>
    <input type="date"
        id="FechaNac"
        name="FechaNac"
        class="form-control"
        value="{{ old('FechaNac', $instructores->FechaNac) }}">
</div>

{{-- EPS --}}
<div class="form-group">
    <label for="tbleps_NIS">
        <i class="fas fa-hospital"></i>
        EPS
    </label>
    <input type="text"
        id="tbleps_NIS"
        name="tbleps_NIS"
        class="form-control"
        placeholder="Ingrese la EPS"
        value="{{ old('tbleps_NIS', $instructores->tbleps_NIS) }}">
</div>

{{-- Rol Administrativo --}}
<div class="form-group">
    <label for="tblrolesadministrativos_NIS">
        <i class="fas fa-user-shield"></i>
        Rol Administrativo
    </label>
    <input type="text"
        id="tblrolesadministrativos_NIS"
        name="tblrolesadministrativos_NIS"
        class="form-control"
        placeholder="Ingrese el rol administrativo"
        value="{{ old('tblrolesadministrativos_NIS', $instructores->tblrolesadministrativos_NIS) }}">
</div>
                </div>

                {{-- Footer --}}
                <div class="card-footer text-right">
                    <a href="{{ route('instructores.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Actualizar Instructor
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
