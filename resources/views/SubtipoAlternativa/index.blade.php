@extends('adminlte::page')

@section('title', 'subtipos de alternativa')

@section('content_header')
<h1>Subtipos de alternativa</h1>
<p>Listado general de subtipos de alternativa registrados</p>
@endsection

@section('content')

<div class="card">

    <div class="card-header">
        <a href="{{ route('subtipoalternativa.create') }}"
            class="btn btn-primary">
            <i class="fas fa-plus"></i> Nuevo subtipo de alternativa
        </a>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Alternativa principal</th>
                    <th>nombre</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($subtipo as $item)
                <tr>
                    <td>{{ $item->alternativaNIS }}</td>
                    <td>{{ $item->nombre }}</td>
                    

                    <td class="text-center">

                        {{-- Botón Editar --}}
                        <a href="{{ route('subtipoalternativa.edit', $item->NIS) }}"
                            class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Editar
                        </a>

                        {{-- Botón Eliminar --}}
                        <form action="{{ route('subtipoalternativa.destroy', $item->NIS) }}"
                            method="POST"
                            style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Seguro que desea eliminar este subtipo de alternativa?')">
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