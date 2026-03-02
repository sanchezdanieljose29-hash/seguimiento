@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Aprendices</h1>
<p>Welcome to the fuk*ng remix</p>
<!-- /.card-header -->
<div class="card-body table-responsive p-0">


    <a href="{{ route('aprendices.create') }}" class="btn btn-primary mb-3">Nuevo aprendiz</a>



    <table class="table table-hover text-nowrap">
        <thead>
            <tr>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Tipo de documentos</th>
                <th> Número de documento</th>
                <th>Direccion</th>
                <th>Telefono</th>
                <th>CorreoInstitucional</th>
                <th>CorreoPersonal</th>
                <th>Sexo</th>
                <th>FechaNac</th>
                <th>EPS</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($aprendices as $item)
            <tr>
                <td>{{ $item->Nombres  }}</td>
                <td>{{ $item->Apellidos }}</td>
                <td>{{ $item->tbltiposdocumentos_NIS }}</td>
                <td>{{ $item->Ndoc }}</td>
                <td>{{ $item->Direccion }}</td>
                <td>{{ $item->Telefono }}</td>
                <td>{{ $item->CorreoInstitucional }}</td>
                <td>{{ $item->CorreoPersonal }}</td>
                <td>{{ $item->Sexo }}</td>
                <td>{{ $item->FechaNac }}</td>
                <td>{{ $item->tbleps_NIS }}</td>
                <td class="text-center">

                    <a href="{{ route('aprendices.edit',  $item->NIS)}}" method="POST" class="btn-warning">
                        @csrf
                        @method('PUT')
                        Editar
                    </a>

                    <form action="{{ route('aprendices.destroy', $item->NIS)}}" method="POST" style="display:inline;">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger btn-sm" onclick="return confirm ('¿Seguro que desea eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>

            @endforeach

            </tr>
        </tbody>
    </table>
</div>

@stop

@section('content')

@stop