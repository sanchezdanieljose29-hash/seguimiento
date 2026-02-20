@extends('adminlte::page')

@section('title', 'Editar Tipo de Documento')

@section('content_header')
    <h1 class="m-0 text-dark">Actualizar Tipo de Documento</h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        {{-- Card --}}
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-file-alt"></i>
                    Datos del Tipo de Documento
                </h3>
            </div>

            <form action="{{ route('tiposdedocumentos.update', $tipo->NIS) }}" method="POST">
                @csrf
                @method('PUT')
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
                               value="{{ old('Denominacion', $tipo->Denominacion) }}">
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
                                  placeholder="Observaciones adicionales">{{ old('Observaciones', $tipo->Observaciones) }}</textarea>
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
                        <i class="fas fa-save"></i> Actualizar Tipo de Documento
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