@extends('adminlte::page')

@section('title', 'Programas de Formación')

@section('content_header')
    <h1>Programas de Formación</h1>
    <p>Listado general de programas registrados</p>
@endsection

@section('content')

<div class="card">
    <div class="card-header">
        <a href="{{ route('programasdeformacion.create') }}" 
           class="btn btn-primary">
           <i class="fas fa-plus"></i> Nuevo Programa
        </a>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Código</th>
                    <th>Denominación</th>
                    <th>Observaciones</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($programasdeformacion as $item)
                <tr>
                    <td>{{ $item->codigo }}</td>
                    <td>{{ $item->Denominacion }}</td>
                    <td>{{ $item->Observaciones }}</td>

                    <td class="text-center">

                        {{-- Botón Editar --}}
                        <a href="{{ route('programasdeformacion.edit', $item->NIS) }}" 
                           class="btn btn-warning btn-sm">
                           <i class="fas fa-edit"></i> Editar
                        </a>

                        {{-- Botón Eliminar --}}
                        <form action="{{ route('programasdeformacion.destroy', $item->NIS) }}" 
                              method="POST" 
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que desea eliminar este programa?')">
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