    @extends('adminlte::page')

    @section('title', 'Registrar Bitacora')

    @section('content_header')
    <h1 class="text-primary"><i class="fas fa-clipboard-list mr-2"></i>Bitacoras</h1>
    @stop

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    @section('content')
    <div class="container-fluid">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-edit mr-1"></i>
                    FORMATO BITÁCORA DE SEGUIMIENTO ETAPA PRODUCTIVA
                </h3>
            </div>


            <form action="{{ route('bitacorasseguimientos.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

                    {{-- Bitácora de Seguimiento --}}
                    <div class="card card-secondary card-outline mb-4">
                        <div class="card-header bg-secondary">
                            <h5 class="card-title mb-0 text-white">
                                <i class="fas fa-book mr-2"></i>CLASIFICACIÓN DE LA INFORMACIÓN
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row">

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Bitácora</label>
                                        <input type="text" name="BitacoraNumero" class="form-control form-control-sm" placeholder="N° bitácora">
                                    </div>
                                </div>

                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label>Aprendiz</label>
                                        <select name="Aprendiz_NIS" class="form-control form-control-sm">
                                            <option value="">Selecciona</option>
                                            @foreach($aprendices as $item)
                                            <option value="{{ $item->NIS }}">
                                                {{ $item->Nombres }} {{ $item->Apellidos }}
                                            </option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Programa</label>
                                    <select name="ProgramaFormacion_NIS" class="form-control form-control-sm">
                                        <option value="">Selecciona</option>
                                        @foreach($programas as $item)
                                        <option value="{{ $item->NIS }}">
                                            {{ $item->Denominacion }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Ficha de caracterización</label>
                            <select name="FichaCaracterizacion_NIS" class="form-control form-control-sm">
                                <option value="">Selecciona</option>
                                @foreach($fichas as $item)
                                <option value="{{ $item->NIS }}">
                                    {{ $item->Denominacion }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Ente</label>
                            <select name="EnteConformador_NIS" class="form-control form-control-sm">
                                <option value="">Selecciona</option>
                                @foreach($ente as $item)
                                <option value="{{ $item->NIS }}">
                                    {{ $item->RazonSocial }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Instructor</label>
                            <select name="Instructor_NIS" class="form-control form-control-sm">
                                <option value="">Selecciona</option>
                                @foreach($instructor as $item)
                                <option value="{{ $item->NIS }}">
                                    {{ $item->Nombres }} {{ $item->Apellidos }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Tipo</label>
                            <select name="TipoAlternativa_NIS" class="form-control form-control-sm">
                                <option value="">Selecciona</option>
                                @foreach($tipoalternativa as $item)
                                <option value="{{ $item->NIS }}">
                                    {{ $item->Denominacion }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label>Subipo</label>
                            <select name="SubtipoAlternativa" class="form-control form-control-sm">
                                <option value="">Selecciona</option>
                                @foreach($subtipoalternativa as $item)
                                <option value="{{ $item->NIS }}">
                                    {{ $item->nombre }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>


        </div>
    </div>
    </div>
    </div>

    {{-- Evidencias de actividades --}}

    <div class="card card-secondary card-outline mb-4">
        <div class="card-header bg-secondary">
            <h5 class="card-title mb-0 text-white">
                <i class="fas fa-book mr-2"></i>CLASIFICACIÓN DE LA INFORMACIÓN
            </h5>
        </div>
        <div class="card-body">
            <div class="grupo-actividad" class="row">

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fechaInicio">Fecha de Inicio <span class="text-danger">*</span></label>
                        <input type="date" id="fechaInicio" name="FechaInicioActividad[]" class="form-control form-control-sm">
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fechaFin">Fecha de Fin <span class="text-danger">*</span></label>
                        <input type="date" id="fechaFin" name="FechaFinActividad[]" class="form-control form-control-sm">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Descripción de la actividad</label>
                                <textarea name="DescripcionActividad[]" rows="4" class="form-control form-control-sm" placeholder="Descripción de la actividad..."></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Observaciones</label>
                            <textarea name="Observaciones[]" rows="4" class="form-control form-control-sm"
                                placeholder="Escriba aquí las observaciones relevantes..."></textarea>
                        </div>
                    </div>

                </div>
                <div id="contenedor-evidencias">
                    <div class="evidencia">
                        <input type="file" name="EvidenciaCumplimiento[]" id="EvidenciaCumplimiento">
                        <label for="EvidenciaCumplimiento">Seleccionar archivo</label>
                    </div>
                </div>
                <br>
                <button type="button" class="agregarActividad">Agregar evidencia</button>
            </div>
        </div>
    </div>




    <script>
        document.querySelectorAll('.agregarActividad').forEach(boton => {
            boton.addEventListener('click', function() {
                // Buscar el contenedor relativo al botón
                let contenedor = this.closest('.grupo-actividad').querySelector('#contenedor-evidencias');

                //  Clonar la primera evidencia
                let original = contenedor.querySelector('.evidencia');
                let clon = original.cloneNode(true);

                // Limpiar valores
                clon.querySelectorAll('input, textarea').forEach(el => el.value = '');

                //  Dar un ID único al archivo y actualizar la etiqueta
                let archivo = clon.querySelector('input[type="file"]');
                archivo.id = 'EvidenciaCumplimiento_' + Date.now();
                clon.querySelector('label').setAttribute('for', archivo.id);

                // Agregar el clon al contenedor
                contenedor.appendChild(clon);
            });
        });
    </script>



    {{-- Seguridad y Riesgos --}}
    <div class="card card-warning card-outline mb-4">
        <div class="card-header bg-warning">
            <h5 class="card-title mb-0">
                <i class="fas fa-shield-alt mr-2"></i>Decreto 055 de 2015, por el cual se reglamenta la afiliación de estudiantes al Sistema General de Riesgos Laborales y se dictan otras disposiciones
        </div>
        </h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>ARL</label>
                    <select name="AfiliadoArl" class="form-control form-control-sm">
                        <option value=""></option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Riesgo</label>
                    <select name="NivelRiesgo" class="form-control form-control-sm">
                        <option value=""></option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>¿Corresponde?</label>
                    <select name="NivelRiesgoCorresponde" class="form-control form-control-sm">
                        <option value=""></option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>EPP</label>
                    <select name="CuentaConEPP" class="form-control form-control-sm">
                        <option value=""></option>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    </div>

    {{-- Firmas --}}
    <div class="card card-success card-outline mb-4">
        <div class="card-header bg-success">
            <h5 class="card-title mb-0 text-white">
                <i class="fas fa-signature mr-2"></i>Firmas
            </h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Firma del aprendiz</label>
                        <div class="custom-file">
                            <input type="file" name="FirmaAprendiz" class="custom-file-input" id="FirmaAprendiz">
                            <label class="custom-file-label" for="FirmaAprendiz">Seleccionar archivo</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Firma del instructor</label>
                        <div class="custom-file">
                            <input type="file" name="FirmaInstructor" class="custom-file-input" id="FirmaInstructor">
                            <label class="custom-file-label" for="FirmaInstructor">Seleccionar archivo</label>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Firma del jefe inmediato</label>
                        <div class="custom-file">
                            <input type="file" name="firmaJefeInmediato" class="custom-file-input" id="firmaJefeInmediato">
                            <label class="custom-file-label" for="firmaJefeInmediato">Seleccionar archivo</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    </div>

    <div class="card-footer text-right">
        <a href="{{ route('bitacorasseguimientos.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left mr-1"></i> Volver
        </a>
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save mr-1"></i> Guardar
        </button>
    </div>
    </form>
    </div>
    </div>
    @stop

    @section('js')
    <script>
        // Para mostrar el nombre del archivo seleccionado
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
        });
    </script>
    @stop