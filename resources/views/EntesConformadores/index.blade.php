@extends('adminlte::page')

@section('title', 'EPS')

@section('content_header')
<h1>Entes Conformadores</h1>
<p>Listado general de Entes Conformadores registrados</p>
@endsection

@section('content')

<div class="card">

    <div class="card-header">
        <a href="{{ route('enteconformadores.create') }}"
            class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Ente Conformador
        </a>
    </div>



    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Tipo de documento</th>
                    <th>Número de documento</th>
                    <th>Razón Social</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Correo Institucional</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($entes as $item)
                <tr>
                    <td>{{ $item->Tdoc }}</td>
                    <td>{{ $item->Ndoc }}</td>
                    <td>{{ $item->RazonSocial }}</td>
                    <td>{{ $item->Direccion }}</td>
                    <td>{{ $item->Telefono }}</td>
                    <td>{{ $item->CorreoInstitucional }}</td>

                    <td class="text-center">

                        {{-- Botón Editar --}}
                        <a href="{{ route('enteconformadores.edit', $item->NIS) }}"
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>

                        {{-- Botón Eliminar --}}
                        <form action="{{ route('enteconformadores.destroy', $item->NIS) }}"
                            method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Seguro que desea eliminar este Ente Conformador?')">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>

        </table>
    </div>

</div>

@endsection