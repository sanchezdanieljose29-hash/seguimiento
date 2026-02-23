@extends('adminlte::page')

@section('title', 'Crear Regional')

@section('content_header')
    <h1 class="m-0 text-dark">Actualizar Rol</h1>
    
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        {{-- Card --}}
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-map-marked-alt"></i>
                    Datos del rol
                </h3>
            </div>

            <form action="{{ route('rolesadministrativos.update', $roles->NIS) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="card-body">

                    
                    {{-- Descripcion --}}
                    <div class="form-group">
                        <label for="Descripcion">
                            <i class="fas fa-barcode"></i>
                            Descripcion
                        </label>
                        <input type="text"
                               id="Descripcion"
                               name="Descripcion"
                               class="form-control"
                               placeholder="Ingrese el código postal"
                               value="{{ old('Descripcion' , $roles -> Descripcion) }}">  
                    </div>

                   
                </div>

                {{-- Footer --}}
                <div class="card-footer text-right">
                    <a href="{{ route('rolesadministrativos.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Actualizar Rol
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
