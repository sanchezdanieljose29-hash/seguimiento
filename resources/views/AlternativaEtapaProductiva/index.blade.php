@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Alternativa</h1>
    <p>Welcome to the fuk*ng remix</p>
    <!-- /.card-header -->   
 <div class="card-body table-responsive p-0">


    <a href="{{ route('alternativaetapa.create') }}" class="btn btn-primary mb-3">Nueva alternativa de etapa productiva</a>

                <table class="table table-hover text-nowrap">

                    
                  <thead>
                    <tr>
                      <th>Denominación</th>
                      <th>descripcion</th>
                    
                      <th class="text-center">Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($alternativa as $item)
                    <tr>
                      <td>{{ $item->Denominacion  }}</td>
                      <td>{{ $item->descripcion }}</td>
                    
                      <td></td>
                      <td class="text-center">

                      <a href="{{ route('alternativaetapa.edit',  $item->NIS)}}" method="POST" class="btn-warning" >
                         @csrf
                         @method('PUT')  
                      Editar
                         </a>

                      <form action="{{ route('alternativaetapa.destroy', $item->NIS)}}" method="POST" style="display:inline;">
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
