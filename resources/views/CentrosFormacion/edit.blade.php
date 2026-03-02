@extends('adminlte::page')

@section('title', 'Crear Centro')

@section('content_header')
<h1 class="m-0 text-dark">Actualizar centro de formación</h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        {{-- Card --}}
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-map-marked-alt"></i>
                    Datos del dentro de formación
                </h3>
            </div>

            <form action="{{ route('centrosformacion.update', $centros->NIS) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">

                    {{-- Código --}}
                    <div class="form-group">
                        <label for="codigo">
                            <i class="fas fa-barcode"></i>
                            Código
                        </label>
                        <input type="text"
                            id="codigo"
                            name="codigo"
                            class="form-control"
                            placeholder="Ingrese el código del centro"
                            value="{{ old('codigo' , $centros->codigo) }}">
                    </div>

                    {{-- Denominación --}}
                    <div class="form-group">
                        <label for="Denominacion">
                            <i class="fas fa-building"></i>
                            Denominación
                        </label>
                        <input type="text"
                            id="Denominacion"
                            name="Denominacion"
                            class="form-control"
                            placeholder="Ingrese la denominación del centro"
                            value="{{ old('Denominacion' , $centros->Denominacion) }}">
                    </div>

                    {{-- Dirección --}}
                    <div class="form-group">
                        <label for="Direccion">
                            <i class="fas fa-building"></i>
                            Dirección
                        </label>
                        <input type="text"
                            id="Direccion"
                            name="Direccion"
                            class="form-control"
                            placeholder="Ingrese la dirección del centro"
                            value="{{ old('Direccion' , $centros->Direccion) }}">
                    </div>

                    {{-- Observaciones --}}
                    <div class="form-group">
                        <label for="Observaciones">
                            <i class="fas fa-building"></i>
                            Observaciones
                        </label>
                        <input type="text"
                            id="Observaciones"
                            name="Observaciones"
                            class="form-control"
                            placeholder="Ingrese las observaciones del centro"
                            value="{{ old('Observaciones' , $centros->Observaciones) }}">
                    </div>

                    {{-- Regionales --}}
                    <div class="form-group">
                        <label for="tblregionales_NIS">
                            <i class="fas fa-building"></i>
                            Regional a la que pertence el centro
                        </label>
                        <input type="text"
                            id="tblregionales_NIS"
                            name="tblregionales_NIS"
                            class="form-control"
                            placeholder="Ingrese la regional a la que pertence el centro"
                            value="{{ old('tblregionales_NIS' , $centros->tblregionales_NIS) }}">
                    </div>

                </div>

                {{-- Footer --}}
                <div class="card-footer text-right">
                    <a href="{{ route('centrosformacion.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Actualizar Centro de Formación
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