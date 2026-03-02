@extends('adminlte::page')

@section('title', 'Crear Regional')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar Alternativa</h1>
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
                    Datos de la alternativa de etapa productiva
                </h3>
            </div>

            <form action="{{ route('alternativaetapa.store') }}" method="POST">
                @csrf

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
                               value="{{ old('Denominacion') }}">
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
                               placeholder=""
                               value="{{ old('descripcion') }}">
                    </div>

                    

                    
                  


                </div>

                {{-- Footer --}}
                <div class="card-footer text-right">
                    <a href="{{ route('alternativaetapa.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Guardar Alternativa
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
