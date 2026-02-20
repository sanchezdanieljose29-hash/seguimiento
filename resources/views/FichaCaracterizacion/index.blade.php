@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Regionales</h1>
    <p>Welcome to the fuk*ng remix</p>
    <!-- /.card-header -->   
 <div class="card-body table-responsive p-0">
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
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($fichas as $fichas)
                    <tr>
                      <td>{{ $fichas->Código  }}</td>
                      <td>{{ $fichas->Denominacion }}</td>
                      <td>{{ $fichas->Cupo }}</td>
                      <td>{{$fichas->FechaInicio}}</td>
                      <td>{{$fichas->FechaFin}}</td>
                      <td>{{$fichas->Direccion}}</td>
                      <td>{{$fichas->Observaciones}}</td>
                      <td><span class="tag tag-success"></span></td>
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
