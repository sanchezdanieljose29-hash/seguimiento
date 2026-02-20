@extends('adminlte::page')

@section('title', 'Crear EPS')

@section('content_header')
    <h1 class="m-0 text-dark">Registrar EPS</h1>
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
                    Datos de la EPS
                </h3>
            </div>

            <form action="{{ route('eps.store') }}" method="POST">
                @csrf

                <div class="card-body">


                    {{-- Número Documento --}}
                    <div class="form-group">
                        <label for="Numdoc">
                            <i class="fas fa-hashtag"></i>
                            Número de Documento
                        </label>
                        <input type="number"
                               id="Numdoc"
                               name="Numdoc"
                               class="form-control @error('Numdoc') is-invalid @enderror"
                               placeholder="Ingrese el número"
                               value="{{ old('Numdoc') }}">
                        @error('Numdoc')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Denominacion --}}
                    <div class="form-group">
                        <label for="Denominacion">
                            <i class="fas fa-building"></i>
                            Denominacion
                        </label>
                        <input type="text"
                               id="Denominacion"
                               name="Denominacion"
                               class="form-control @error('Denominacion') is-invalid @enderror"
                               placeholder="Denominacion"
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
                            <i class="fas fa-phone"></i>
                            Observaciones
                        </label>
                        <input type="text"
                               id="Observaciones"
                               name="Observaciones"
                               class="form-control @error('Observaciones') is-invalid @enderror"
                               placeholder="Observaciones"
                               value="{{ old('Observaciones') }}">
                        @error('Telefono')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>


                </div>

                {{-- Footer --}}
                <div class="card-footer text-right">
                    <a href="{{ route('eps.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Guardar EPS
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

@endsection