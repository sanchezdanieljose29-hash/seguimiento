@extends('adminlte::page')

@section('title', 'Registrar Instructor')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Instructor</h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        {{-- Errores --}}
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

        {{-- Card --}}
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-map-marked-alt"></i>
                    Datos del instructor
                </h3>
            </div>

            <form action="{{ route('instructores.store') }}" method="POST">
                @csrf

                <div class="card-body">

                     Nombres, Apellidos,  tbltiposdocumentos_NIS, Ndoc, Direccion,
                     Telefono, CorreoInstitucional, CorreoPersonal, Sexo, 
                    FechaNac, tbleps_NIS, tblrolesadministrativos_NIS

                    
                    <div class="form-group">
                        <label for="Nombres">
                            <i class="fas fa-barcode"></i>
                            Nombres
                        </label>
                        <input type="text"
                               id="Nombres"
                               name="Nombres"
                               class="form-control"
                               placeholder=""
                               value="{{ old('Nombres') }}">
                    </div>

                    <div class="form-group">
                        <label for="denominacion">
                            <i class="fas fa-building"></i>
                            Apellidos
                        </label>
                        <input type="text"
                               id="Apellidos"
                               name="Apellidos"
                               class="form-control"
                               placeholder=""
                               value="{{ old('Apellidos') }}">
                    </div>

                   
                    <div class="form-group">
                        <label for="tbltiposdocumentos_NIS">
                            <i class="fas fa-comment-dots"></i>
                            Tipo de documento
                        </label>
                        <textarea name="tbltiposdocumentos_NIS"
                                  id="tbltiposdocumentos_NIS"
                                  class="form-control"
                                  rows="4"
                                  placeholder="">{{ old('tbltiposdocumentos_NIS') }}</textarea>
                    </div>

                  

                    
                    <div class="form-group">
                        <label for="Ndoc">
                            <i class="fas fa-comment-dots"></i>
                            Número de documentos
                        </label>
                        <textarea name="Ndoc"
                                  id="Ndoc"
                                  class="form-control"
                                  rows="4"
                                  placeholder="">{{ old('Ndoc') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="Direccion">
                            <i class="fas fa-comment-dots"></i>
                           Direccion
                        </label>
                        <textarea name="Direccion"
                                  id="NdDireccionoc"
                                  class="form-control"
                                  rows="4"
                                  placeholder="">{{ old('Direccion') }}</textarea>
                    </div>

                   
                    <div class="form-group">
                        <label for="Telefono">
                            <i class="fas fa-comment-dots"></i>
                           Telefono
                        </label>
                        <textarea name="Telefono"
                                  id="Telefono"
                                  class="form-control"
                                  rows="4"
                                  placeholder="">{{ old('Telefono') }}</textarea>
                    </div>

                     
                    <div class="form-group">
                        <label for="CorreoInstitucional">
                            <i class="fas fa-comment-dots"></i>
                           Correo Institucional
                        </label>
                        <textarea name="CorreoInstitucional"
                                  id="CorreoInstitucional"
                                  class="form-control"
                                  rows="4"
                                  placeholder="">{{ old('CorreoInstitucional') }}</textarea>
                    </div>

                    
                    <div class="form-group">
                        <label for="CorreoPersonal">
                            <i class="fas fa-comment-dots"></i>
                           Correo Personal
                        </label>
                        <textarea name="CorreoPersonal"
                                  id="CorreoPersonal"
                                  class="form-control"
                                  rows="4"
                                  placeholder="">{{ old('CorreoPersonal') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="Sexo">
                            <i class="fas fa-comment-dots"></i>
                           Sexo
                        </label>
                        <textarea name="Sexo"
                                  id="Sexo"
                                  class="form-control"
                                  rows="4"
                                  placeholder="">{{ old('Sexo') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="FechaNac">
                            <i class="fas fa-comment-dots"></i>
                           Fecha de nacimiento
                        </label>
                        <textarea name="FechaNac"
                                  id="FechaNac"
                                  class="form-control"
                                  rows="4"
                                  placeholder="">{{ old('FechaNac') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="tbleps_NIS">
                            <i class="fas fa-comment-dots"></i>
                           Eps
                        </label>
                        <textarea name="tbleps_NIS"
                                  id="tbleps_NIS"
                                  class="form-control"
                                  rows="4"
                                  placeholder="">{{ old('tbleps_NIS') }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="tblrolesadministrativos_NIS">
                            <i class="fas fa-comment-dots"></i>
                           Roles Administrativos
                        </label>
                        <textarea name="tblrolesadministrativos_NIS"
                                  id="tblrolesadministrativos_NIS"
                                  class="form-control"
                                  rows="4"
                                  placeholder="">{{ old('tblrolesadministrativos_NIS') }}</textarea>
                    </div>


                </div>

                {{-- Footer --}}
                <div class="card-footer text-right">
                    <a href="{{ route('instructores.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Guardar Regional
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
