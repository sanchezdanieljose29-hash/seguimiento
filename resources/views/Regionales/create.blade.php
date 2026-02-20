@extends('adminlte::page')

@section('title', 'Crear Regional')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Regional</h1>
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
                    Datos de la Regional
                </h3>
            </div>

            <form action="{{ route('regionales.store') }}" method="POST">
                @csrf

                <div class="card-body">

                    {{-- Código --}}
                    <div class="form-group">
                        <label for="codigo">
                            <i class="fas fa-barcode"></i>
                            Código postal
                        </label>
                        <input type="text"
                               id="codigo"
                               name="codigo"
                               class="form-control"
                               placeholder="Ingrese el código postal"
                               value="{{ old('codigo') }}">
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
                               placeholder="Nombre de la regional"
                               value="{{ old('Denominacion') }}">
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
                                  placeholder="Observaciones adicionales">{{ old('Observaciones') }}</textarea>
                    </div>

                </div>

                {{-- Footer --}}
                <div class="card-footer text-right">
                    <a href="{{ route('regionales.index') }}" class="btn btn-secondary">
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
