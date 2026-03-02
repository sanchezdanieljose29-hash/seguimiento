@extends('adminlte::page')

@section('title', 'Crear EPS')

@section('content_header')
<h1 class="m-0 text-dark">Registrar ente conformador</h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
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
                    Datos del ente conformador
                </h3>
            </div>

            <form action="{{ route('enteconformadores.store') }}" method="POST">
                @csrf

                <div class="card-body">




                    {{-- Tipo de Documento --}}
                    <div class="form-group">
                        <label for="Tdoc">
                            <i class="fas fa-hashtag"></i>
                            Tipo de documento
                        </label>
                        <input type="number"
                            id="Tdoc"
                            name="Tdoc"
                            class="form-control"
                            placeholder="Ingrese el tipo de documento"
                            value="{{ old('Tdoc') }}">



                    </div>

                    {{-- Tipo de Documento --}}
                    <div class="form-group">
                        <label for="Ndoc">
                            <i class="fas fa-hashtag"></i>
                            Número de documento
                        </label>
                        <input type="number"
                            id="Ndoc"
                            name="Ndoc"
                            class="form-control"
                            placeholder="Ingrese el número de documento"
                            value="{{ old('Ndoc') }}">



                    </div>

                    {{-- RazonSocial --}}
                    <div class="form-group">
                        <label for="RazonSocial">
                            <i class="fas fa-building"></i>
                            Razon Social
                        </label>
                        <input type="text"
                            id="RazonSocial"
                            name="RazonSocial"
                            class="form-control"
                            placeholder="Razon Social"
                            value="{{ old('RazonSocial') }}">



                    </div>



                    {{-- Direccion --}}
                    <div class="form-group">
                        <label for="Direccion">
                            <i class="fas fa-map-marker-alt"></i>
                            Dirección
                        </label>
                        <input type="text"
                            id="Direccion"
                            name="Direccion"
                            class="form-control"
                            placeholder="Dirección"
                            value="{{ old('Direccion') }}">



                    </div>

                    {{-- Telefono --}}
                    <div class="form-group">
                        <label for="Telefono">
                            <i class="fas fa-phone"></i>
                            Teléfono
                        </label>
                        <input type="text"
                            id="Telefono"
                            name="Telefono"
                            class="form-control"
                            placeholder="Teléfono"
                            value="{{ old('Telefono') }}">



                    </div>

                    {{-- CorreoInstitucional --}}
                    <div class="form-group">
                        <label for="CorreoInstitucional">
                            <i class="fas fa-envelope"></i>
                            Correo Institucional
                        </label>
                        <input type="text"
                            id="CorreoInstitucional"
                            name="CorreoInstitucional"
                            class="form-control"
                            placeholder="Correo Institucional"
                            value="{{ old('CorreoInstitucional') }}">



                    </div>


                </div>

                {{-- Footer --}}
                <div class="card-footer text-right">
                    <a href="{{ route('enteconformadores.index') }}" class="btn btn-secondary">
                        <i class="fas fa-arrow-left"></i> Cancelar
                    </a>

                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save"></i> Guardar Ente Conformador
                    </button>
                </div>

            </form>
        </div>

    </div>
</div>

@endsection