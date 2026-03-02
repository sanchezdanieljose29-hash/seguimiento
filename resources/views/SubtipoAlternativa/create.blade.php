@extends('adminlte::page')

@section('title', 'Crear subtipo de alternativa')

@section('content_header')
<h1 class="m-0 text-dark">Registrar subtipo de alternativa</h1>
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
                    <i class="fas fa-hospital"></i>
                    Datos del subtipo de alternativa
                </h3>
            </div>

            <form action="{{ route('subtipoalternativa.store') }}" method="POST">
                @csrf

                <div class="card-body">


                    {{-- Alternativa principal --}}
                    <div class="form-group">
                        <label for="alternativaNIS">
                            <i class="fas fa-hashtag"></i>
                            Alternativa principal
                        </label>
                        <input type="number"
                            id="alternativaNIS"
                            name="alternativaNIS"
                            class="form-control @error('alternativaNIS') is-invalid @enderror"
                            placeholder="Ingrese el número"
                            value="{{ old('alternativaNIS') }}">
                        @error('alternativaNIS')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    {{-- nombre --}}
                    <div class="form-group">
                        <label for="nombre">
                            <i class="fas fa-building"></i>
                            Nombre
                        </label>
                        <input type="text"
                            id="nombre"
                            name="nombre"
                            class="form-control @error('nombre') is-invalid @enderror"
                            placeholder="Nombre"
                            value="{{ old('nombre') }}">
                        @error('nombre')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                </div>

                {{-- Footer --}}
                <div class="card-footer text-right">
                    <a href="{{ route('subtipoalternativa.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Volver al listado
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Guardar subtipo de alternativa
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

@endsection