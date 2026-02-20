@extends('adminlte::page')

@section('title', 'Crear Regional')

@section('content_header')
    <h1 class="m-0 text-dark">Actualizar Programa</h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        {{-- Card --}}
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-map-marked-alt"></i>
                    Datos del programa de formación
                </h3>
            </div>

            <form action="{{ route('programasdeformacion.update', $programasdeformacion->NIS) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">

                    
                    {{-- Código --}}
                    <div class="form-group">
                        <label for="codigo">
                            <i class="fas fa-barcode"></i>
                            Código del programa
                        </label>
                        <input type="text"
                               id="codigo"
                               name="codigo"
                               class="form-control"
                               placeholder="Ingrese el código del programa"
                               value="{{ old('codigo' , $programasdeformacion->codigo) }}">  
                    </div>

                    {{-- Denominación --}}
                    <div class="form-group">
                        <label for="denominacion">
                            <i class="fas fa-building"></i>
                            Denominación
                        </label>
                        <input type="text"
                               id="denominacion"
                               name="Denominacion"
                               class="form-control"
                               placeholder="Nombre del programa"
                               value="{{ old('Denominacion', $programasdeformacion->Denominacion) }}">
                    </div>

                    {{-- Observaciones --}}
                    <div class="form-group">
                        <label for="Observaciones">
                            <i class="fas fa-comment-dots"></i>
                            Observaciones
                        </label>
                        <textarea name="Observaciones"
                                  id="Observaciones"
                                  class="form-control"
                                  rows="4"
                                  value="Observaciones adicionales">{{ old('Observaciones', $programasdeformacion->Observaciones) }}</textarea>
                    </div>

                </div>

                {{-- Footer --}}
                <div class="card-footer text-right">
                    <a href="{{ route('programasdeformacion.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Actualizar Regional
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
