@extends('adminlte::page')

@section('title', 'Editar Ente Conformador')

@section('content_header')
<h1 class="m-0 text-dark">Actualizar Ente Conformador</h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

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

        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-building"></i>
                    Datos del Ente Conformador
                </h3>
            </div>

            <form action="{{ route('enteconformadores.update', $entes->NIS) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">


                    {{-- Tipo Documento --}}
                    <div class="form-group">
                        <label for="Tdoc">Tipo Documento</label>
                        <input type="text"
                            name="Tdoc"
                            class="form-control"
                            value="{{ old('Tdoc', $entes->Tdoc) }}">
                      
                    </div>

                    {{-- Número Documento --}}
                    <div class="form-group">
                        <label for="Ndoc">Número Documento</label>
                        <input type="text"
                            name="Ndoc"
                            class="form-control"
                           value="{{ old('Ndoc' , $entes -> Ndoc) }}">  
                     
                    </div>

                    {{-- Razón Social --}}
                    <div class="form-group">
                        <label for="RazonSocial">Razón Social</label>
                        <input type="text"
                        class="form-control"
                            name="RazonSocial"
                            value="{{ old('RazonSocial', $entes->RazonSocial) }}">

                    </div>

                    {{-- Dirección --}}
                    <div class="form-group">
                        <label for="Direccion">Dirección</label>
                        <input type="text"
                        class="form-control"
                            name="Direccion"
                            
                            value="{{ old('Direccion', $entes->Direccion) }}">

                    </div>

                    {{-- Teléfono --}}
                    <div class="form-group">
                        <label for="Telefono">Teléfono</label>
                        <input type="text"
                            name="Telefono"
                            class="form-control"
                            value="{{ old('Telefono', $entes->Telefono) }}">
                       
                    </div>

                    {{-- Correo Institucional --}}
                    <div class="form-group">
                        <label for="CorreoInstitucional">Correo Institucional</label>
                        <input type="email"
                            name="CorreoInstitucional"
                            class="form-control"
                            value="{{ old('CorreoInstitucional', $entes->CorreoInstitucional) }}">

                    </div>

                </div>

                <div class="card-footer text-right">
                    <a href="{{ route('enteconformadores.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Actualizar
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>
@endsection