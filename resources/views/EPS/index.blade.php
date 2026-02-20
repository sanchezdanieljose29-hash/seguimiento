@extends('adminlte::page')

@section('title', 'EPS')

@section('content_header')
    <h1>EPS</h1>
    <p>Listado general de EPS registradas</p>
@endsection

@section('content')

<div class="card">

    <div class="card-header">
        <a href="{{ route('eps.create') }}" 
           class="btn btn-primary">
           <i class="fas fa-plus"></i> Nueva EPS
        </a>
    </div>

    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap">
            <thead>
                <tr>
                    <th>Número de documento</th>
                    <th>Denominación</th>
                    <th>Observaciones</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($eps as $item)
                <tr>
                    <td>{{ $item->Numdoc }}</td>
                    <td>{{ $item->Denominacion }}</td>
                    <td>{{ $item->Observaciones }}</td>

                    <td class="text-center">

                        {{-- Botón Editar --}}
                        <a href="{{ route('eps.edit', $item->NIS) }}" 
                           class="btn btn-warning btn-sm">
                           <i class="fas fa-edit"></i> Editar
                        </a>

                        {{-- Botón Eliminar --}}
                        <form action="{{ route('eps.destroy', $item->NIS) }}" 
                              method="POST" 
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que desea eliminar esta EPS?')">
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