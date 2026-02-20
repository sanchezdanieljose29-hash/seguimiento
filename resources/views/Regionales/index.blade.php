@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Regionales</h1>
    <p>Welcome to the fuk*ng remix</p>
    <!-- /.card-header -->   
 <div class="card-body table-responsive p-0">


    <a href="{{ route('regionales.create') }}" class="btn btn-primary mb-3">Nuevo Comité</a>

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
                     @foreach ($reg as $item)
                    <tr>
                      <td>{{ $item->codigo  }}</td>
                      <td>{{ $item->Denominacion }}</td>
                      <td>{{ $item->Observaciones }}</td>
                      <td class="text-center">

                      <a href="{{ route('regionales.edit',  $item->NIS)}}" method="POST" class="btn-warning" >
                         @csrf
                         @method('PUT')  
                      Editar
                         </a>

                      <form action="{{ route('regionales.destroy', $item->NIS)}}" method="POST" style="display:inline;">
                      @csrf
                      @method("DELETE")
                      <button class="btn btn-danger btn-sm" onclick="return confirm ('¿Seguro que desea eliminar?')"
                      >Eliminar</button>
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
