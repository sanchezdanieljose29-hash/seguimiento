@extends('adminlte::page')

@section('title', 'Crear Alternativa')

@section('content_header')
<h1 class="m-0 text-dark">Actualizar Alternativa de etapa productiva</h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        {{-- Card --}}
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-map-marked-alt"></i>
                    Datos de la alternativa
                </h3>
            </div>

            <form action="{{ route('alternativaetapa.update', $alternativa->NIS) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">


                    {{-- Código --}}
                    <div class="form-group">
                        <label for="Denominacion">
                            <i class="fas fa-barcode"></i>
                            Denominacion
                        </label>
                        <input type="text"
                            id="Denominacion"
                            name="Denominacion"
                            class="form-control"
                            placeholder=""
                            value="{{ old('Denominacion' , $alternativa->Denominacion) }}">
                    </div>

                    {{-- Denominación --}}
                    <div class="form-group">
                        <label for="descripcion">
                            <i class="fas fa-building"></i>
                            descripcion
                        </label>
                        <input type="text"
                            id="descripcion"
                            name="descripcion"
                            class="form-control"
                            placeholder="Nombre de la regional"
                            value="{{ old('descripcion', $alternativa->descripcion) }}">
                    </div>


                </div>

                {{-- Footer --}}
                <div class="card-footer text-right">
                    <a href="{{ route('alternativaetapa.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Actualizar la altertiva de etapa pruductiva
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