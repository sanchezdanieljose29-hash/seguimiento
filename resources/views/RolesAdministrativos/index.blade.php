@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tipos de Documentos</h1>
    <p>Welcome to the fuk*ng remix</p>
    <!-- /.card-header -->   
 <div class="card-body table-responsive p-0">

   <div class="card">
    <div class="card-header">
        <a href="{{ route('rolesadministrativos.create') }}" 
           class="btn btn-primary">
           <i class="fas fa-plus"></i> Nuevo Rol
        </a>
    </div>
                  </div>
<table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Descripcion</th>
                      <th class="text-center">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($roles as $item)
                    <tr>
                      <td>{{ $item->Descripcion  }}</td>
                      <td><span class="tag tag-success"></span></td>
                      <td class="text-center"> 
                      {{-- Botón Editar --}}
                        <a href="{{ route('rolesadministrativos.edit', $item->NIS) }}" 
                           class="btn btn-warning btn-sm">
                           <i class="fas fa-edit"></i> Editar
                        </a>
                         
                        {{-- Botón Eliminar --}}
                        <form action="{{ route('rolesadministrativos.destroy', $item->NIS) }}" 
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
