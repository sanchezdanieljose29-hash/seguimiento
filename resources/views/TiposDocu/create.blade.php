@extends('adminlte::page')

@section('title', 'Crear Tipo de Documento')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Tipo de Documento</h1>
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
                    <i class="fas fa-file-alt"></i>
                    Datos del Tipo de Documento
                </h3>
            </div>

            <form action="{{ route('tiposdedocumentos.store') }}" method="POST">
                @csrf

                <div class="card-body">

                    {{-- Denominación --}}
                    <div class="form-group">
                        <label for="Denominacion">
                            <i class="fas fa-file-signature"></i>
                            Denominación
                        </label>
                        <input type="text"
                               id="Denominacion"
                               name="Denominacion"
                               class="form-control @error('Denominacion') is-invalid @enderror"
                               placeholder="Ingrese la denominación"
                               value="{{ old('Denominacion') }}">
                        @error('Denominacion')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Observaciones --}}
                    <div class="form-group">
                        <label for="Observaciones">
                            <i class="fas fa-comment-dots"></i>
                            Observaciones
                        </label>
                        <textarea name="Observaciones"
                                  id="Observaciones"
                                  class="form-control @error('Observaciones') is-invalid @enderror"
                                  rows="4"
                                  placeholder="Observaciones adicionales">{{ old('Observaciones') }}</textarea>
                        @error('Observaciones')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                </div>

                {{-- Footer --}}
                <div class="card-footer text-right">
                    <a href="{{ route('tiposdedocumentos.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Guardar Tipo de Documento
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