@extends('adminlte::page')

@section('title', 'Centros de formación')

@section('content_header')
<h1>Centros de formación</h1>
<p>Listado general de centros de formación registrados</p>
@endsection

@section('content')

<div class="card">

    <div class="card-header">
        <a href="{{ route('centrosformacion.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo Centro de Formación
        </a>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            

            <thead>
                <tr>
                    <th>codigo</th>
                    <th>Denominacion</th>
                    <th>Direccion</th>
                    <th>Observaciones</th>
                    <th>Regional</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($centros as $item)
                <tr>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->Denominacion }}</td>
                    <td>{{ $item->Direccion }}</td>
                    <td>{{ $item->Observaciones }}</td>
                    <td>{{ $item->tblregionales_NIS}}</td>

                    <td class="text-center">

                        {{-- Botón Editar --}}
                        <a href="{{ route('centrosformacion.edit', $item->NIS) }}"
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>

                        {{-- Botón Eliminar --}}
                        <form action="{{ route('centrosformacion.destroy', $item->NIS) }}"
                            method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Seguro que desea eliminar este tipo de documento?')">
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