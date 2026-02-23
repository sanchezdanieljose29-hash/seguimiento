@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Regionales</h1>
    <p>Welcome to the fuk*ng remix</p>
    <!-- /.card-header -->   
 <div class="card-body table-responsive p-0">

  <div class="card">
    <div class="card-header">
        <a href="{{ route('fichasdecaracterizacion.create') }}" 
           class="btn btn-primary">
           <i class="fas fa-plus"></i> Nueva ficha
        </a>
    </div>
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Código</th>
                      <th>Denominación</th>
                      <th>Cupo</th>
                      <th>Fecha de inicio</th>
                      <th>Fecha de finalización</th>
                      <th>Direccion</th>
                      <th>Observaciones</th>
                      <th>Programas de formación</th>
                      <th>Fichas de caracterización</th>
                      <th>Acciones</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($fichas as $item)
                    <tr>
                      <td>{{ $item->codigo  }}</td>
                      <td>{{ $item->Denominacion }}</td>
                      <td>{{ $item->Cupo }}</td>
                      <td>{{$item->FechaInicio}}</td>
                      <td>{{$item->FechaFin}}</td>
                      <td>{{$item->Direccion}}</td>
                      <td>{{$item->Observaciones}}</td>
                      <td>{{$item->tblprogramasdeformacion_NIS}}</td>
                      <td>{{$item->tblcentrosdeformacion_NIS}}</td>
                      <td><span class="tag tag-success"></span></td>
                       <td class="text-center"> 
                      {{-- Botón Editar --}}
                        <a href="{{ route('fichasdecaracterizacion.edit', $item->NIS) }}" 
                           class="btn btn-warning btn-sm">
                           <i class="fas fa-edit"></i> Editar
                        </a>
                         
                        {{-- Botón Eliminar --}}
                        <form action="{{ route('fichasdecaracterizacion.destroy', $item->NIS) }}" 
                              method="POST" 
                              style="display:inline;">
                            @csrf
                            @method('DELETE')

                            <button type="submit" 
                                    class="btn btn-danger btn-sm"
                                    onclick="return confirm('¿Seguro que desea eliminar este programa?')">
                                <i class="fas fa-trash"></i> Eliminar
                            </button>
                      <td></td>
                    </tr>
                        @endforeach
                      
                    </tr>
                  </tbody>
                </table>
              </div>

@stop

@section('content')
    
@stop
