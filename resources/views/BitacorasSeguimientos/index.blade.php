@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
<h1>Aprendices</h1>
<p>Welcome to the fuk*ng remix</p>
<!-- /.card-header -->
<div class="card-body table-responsive p-0">

    <a href="{{ route('bitacorasseguimientos.create') }}" class="btn btn-primary mb-3">Nueva bitácora</a>

    <table class="table table-hover text-nowrap">
        <thead>
            <tr> 
                <!-- Nuevos campos de bitácora agregados -->
                <th>Fecha Inicio Periodo</th>
                <th>Fecha Fin Periodo</th>
                <th>Bitácora Número</th>
                <th>Programa Formación</th>
                <th>Ente Conformador</th>
                <th>Instructor</th>
                <th>Tipo Alternativa</th>
                <th>Subtipo Alternativa</th>
                <th>Descripción Actividad</th>
                <th>Evidencia Cumplimiento</th>
                <th>Observaciones</th>
                <th>Afiliado ARL</th>
                <th>Nivel Riesgo</th>
                <th>Nivel Riesgo Corresponde</th>
                <th>Cuenta con EPP</th>
                <th>Firma Aprendiz</th>
                <th>Firma Instructor</th>
                <th>Firma Jefe Inmediato</th>
                <th>Creado En</th>
                <th>Actualizado En</th>
                <th class="text-center">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bitacora as $item)
            <tr>
                <!-- Nuevos campos de bitácora agregados -->
                <td>{{ $item->FechaInicioPeriodo }}</td>
                <td>{{ $item->FechaFinPeriodo }}</td>
                <td>{{ $item->BitacoraNumero }}</td>
                <td>{{ $item->ProgramaFormacion_NIS }}</td>
                <td>{{ $item->EnteConformador_NIS }}</td>
                <td>{{ $item->Instructor_NIS }}</td>
                <td>{{ $item->TipoAlternativa_NIS }}</td>
                <td>{{ $item->SubtipoAlternativa }}</td>
                <dt> {{ $item->EvidenciaCumplimiento }}</dt>
                <td>
                
    
                </td>
                <td>{{ Str::limit($item->Observaciones ) }}</td>
                <td>{{ $item->AfiliadoArl}}</td>
                <td>{{ $item->NivelRiesgo }}</td>
                <td>{{ $item->NivelRiesgoCorresponde }}</td>
                <td>{{ isset($item->CuentaConEPP) ? ($item->CuentaConEPP ? 'Sí' : 'No') : 'N/A' }}</td>
                <td>{{ isset($item->FirmaAprendiz) ? ($item->FirmaAprendiz ? '✓' : '✗') : 'N/A' }}</td>
                <td>{{ isset($item->FirmaInstructor) ? ($item->FirmaInstructor ? '✓' : '✗') : 'N/A' }}</td>
                <td>{{ isset($item->firmaJefeInmediato) ? ($item->firmaJefeInmediato ? '✓' : '✗') : 'N/A' }}</td>
                <td>{{ $item->CreadoEn ?? 'N/A' }}</td>
                <td>{{ $item->ActualizadoEn ?? 'N/A' }}</td>
                <td class="text-center">
                    <a href="{{ route('bitacorasseguimientos.edit',  $item->NIS)}}" class="btn btn-warning btn-sm">
                        Editar
                    </a>

                    <form action="{{ route('bitacorasseguimientos.destroy', $item->NIS)}}" method="POST" style="display:inline;">
                        @csrf
                        @method("DELETE")
                        <button class="btn btn-danger btn-sm" onclick="return confirm('¿Seguro que desea eliminar?')">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@stop

@section('content')
@stop