@extends('adminlte::page')

@section('title', 'Actualizar Bitacora')

@section('content_header')
<h1 class="m-0 text-dark">Actualizar Bitacora</h1>
@endsection

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">

        {{-- Card --}}
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-map-marked-alt"></i>
                    Datos del dentro de la bitacora
                </h3>
            </div>

            <form action="{{ route('bitacorasseguimientos.update', $bitacora->NIS) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="card-body">

                    {{-- FechaInicioPeriodo --}}
                    <div class="form-group">
                        <label for="FechaInicioPeriodo">Fecha Inicio Periodo</label>
                        <input type="date" id="FechaInicioPeriodo" name="FechaInicioPeriodo" class="form-control" value="{{ old('FechaInicioPeriodo' , $aprendices->FechaInicioPeriodo ?? '') }}">
                    </div>

                    {{-- FechaFinPeriodo --}}
                    <div class="form-group">
                        <label for="FechaFinPeriodo">Fecha Fin Periodo</label>
                        <input type="date" id="FechaFinPeriodo" name="FechaFinPeriodo" class="form-control" value="{{ old('FechaFinPeriodo' , $aprendices->FechaFinPeriodo ?? '') }}">
                    </div>

                    {{-- BitacoraNumero --}}
                    <div class="form-group">
                        <label for="BitacoraNumero">Bitácora Número</label>
                        <input type="text" id="BitacoraNumero" name="BitacoraNumero" class="form-control" value="{{ old('BitacoraNumero' , $aprendices->BitacoraNumero ?? '') }}">
                    </div>

                    {{-- ProgramaFormacion_NIS --}}
                    <div class="form-group">
                        <label for="ProgramaFormacion_NIS">Programa Formación NIS</label>
                        <input type="text" id="ProgramaFormacion_NIS" name="ProgramaFormacion_NIS" class="form-control" value="{{ old('ProgramaFormacion_NIS' , $aprendices->ProgramaFormacion_NIS ?? '') }}">
                    </div>

                    {{-- EnteConformador_NIS --}}
                    <div class="form-group">
                        <label for="EnteConformador_NIS">Ente Conformador NIS</label>
                        <input type="text" id="EnteConformador_NIS" name="EnteConformador_NIS" class="form-control" value="{{ old('EnteConformador_NIS' , $aprendices->EnteConformador_NIS ?? '') }}">
                    </div>

                    {{-- Instructor_NIS --}}
                    <div class="form-group">
                        <label for="Instructor_NIS">Instructor NIS</label>
                        <input type="text" id="Instructor_NIS" name="Instructor_NIS" class="form-control" value="{{ old('Instructor_NIS' , $aprendices->Instructor_NIS ?? '') }}">
                    </div>

                    {{-- TipoAlternativa_NIS --}}
                    <div class="form-group">
                        <label for="TipoAlternativa_NIS">Tipo Alternativa NIS</label>
                        <input type="text" id="TipoAlternativa_NIS" name="TipoAlternativa_NIS" class="form-control" value="{{ old('TipoAlternativa_NIS' , $aprendices->TipoAlternativa_NIS ?? '') }}">
                    </div>

                    {{-- SubtipoAlternativa --}}
                    <div class="form-group">
                        <label for="SubtipoAlternativa">Subtipo Alternativa</label>
                        <input type="text" id="SubtipoAlternativa" name="SubtipoAlternativa" class="form-control" value="{{ old('SubtipoAlternativa' , $aprendices->SubtipoAlternativa ?? '') }}">
                    </div>

                    {{-- DescripcionActividad --}}
                    <div class="form-group">
                        <label for="DescripcionActividad">Descripción Actividad</label>
                        <textarea id="DescripcionActividad" name="DescripcionActividad" class="form-control">{{ old('DescripcionActividad' , $aprendices->DescripcionActividad ?? '') }}</textarea>
                    </div>

                    {{-- EvidenciaCumplimiento --}}
                    <div class="form-group">
                        <label for="EvidenciaCumplimiento">Evidencia Cumplimiento</label>
                        <input type="text" id="EvidenciaCumplimiento" name="EvidenciaCumplimiento" class="form-control" value="{{ old('EvidenciaCumplimiento' , $aprendices->EvidenciaCumplimiento ?? '') }}">
                    </div>

                    {{-- Observaciones --}}
                    <div class="form-group">
                        <label for="Observaciones">Observaciones</label>
                        <textarea id="Observaciones" name="Observaciones" class="form-control">{{ old('Observaciones' , $aprendices->Observaciones ?? '') }}</textarea>
                    </div>

                    {{-- AfiliadoArl --}}
                    <div class="form-group">
                        <label for="AfiliadoArl">Afiliado ARL</label>
                        <input type="text" id="AfiliadoArl" name="AfiliadoArl" class="form-control" value="{{ old('AfiliadoArl' , $aprendices->AfiliadoArl ?? '') }}">
                    </div>

                    {{-- NivelRiesgo --}}
                    <div class="form-group">
                        <label for="NivelRiesgo">Nivel Riesgo</label>
                        <input type="text" id="NivelRiesgo" name="NivelRiesgo" class="form-control" value="{{ old('NivelRiesgo' , $aprendices->NivelRiesgo ?? '') }}">
                    </div>

                    {{-- NivelRiesgoCorresponde --}}
                    <div class="form-group">
                        <label for="NivelRiesgoCorresponde">Nivel Riesgo Corresponde</label>
                        <input type="text" id="NivelRiesgoCorresponde" name="NivelRiesgoCorresponde" class="form-control" value="{{ old('NivelRiesgoCorresponde' , $aprendices->NivelRiesgoCorresponde ?? '') }}">
                    </div>

                    {{-- CuentaConEPP --}}
                    <div class="form-group">
                        <label for="CuentaConEPP">Cuenta Con EPP</label>
                        <input type="text" id="CuentaConEPP" name="CuentaConEPP" class="form-control" value="{{ old('CuentaConEPP' , $aprendices->CuentaConEPP ?? '') }}">
                    </div>

                    {{-- FirmaAprendiz --}}
                    <div class="form-group">
                        <label for="FirmaAprendiz">Firma Aprendiz</label>
                        <input type="text" id="FirmaAprendiz" name="FirmaAprendiz" class="form-control" value="{{ old('FirmaAprendiz' , $aprendices->FirmaAprendiz ?? '') }}">
                    </div>

                    {{-- FirmaInstructor --}}
                    <div class="form-group">
                        <label for="FirmaInstructor">Firma Instructor</label>
                        <input type="text" id="FirmaInstructor" name="FirmaInstructor" class="form-control" value="{{ old('FirmaInstructor' , $aprendices->FirmaInstructor ?? '') }}">
                    </div>

                    {{-- firmaJefeInmediato --}}
                    <div class="form-group">
                        <label for="firmaJefeInmediato">Firma Jefe Inmediato</label>
                        <input type="text" id="firmaJefeInmediato" name="firmaJefeInmediato" class="form-control" value="{{ old('firmaJefeInmediato' , $aprendices->firmaJefeInmediato ?? '') }}">
                    </div>
                    {{-- Footer --}}
                    <div class="card-footer text-right">
                        <a href="{{ route('bitacorasseguimientos.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Volver
                        </a>
                        <br>
                        <br>
                        <button type="submit" class="btn btn-success">
                            <i class="fas fa-save"></i> Actualizar Bitacora
                        </button>
                    </div>

            </form>
        </div>

    </div>
</div>

{{-- Mensaje de éxito --}}
@if(session('success'))
<script>
    alert("{{ session('success') }}");
</script>
@endif

@endsection