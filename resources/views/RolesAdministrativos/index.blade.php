@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Tipos de Documentos</h1>
    <p>Welcome to the fuk*ng remix</p>
    <!-- /.card-header -->   
 <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>Descripcion</th>
                    </tr>
                  </thead>
                  <tbody>
                     @foreach ($roles as $roles)
                    <tr>
                      <td>{{ $roles->Descripcion  }}</td>
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
