<?php

namespace App\Http\Controllers;

use App\Models\alternativasetapapoductiva;
use App\Models\aprendices;
use App\Models\bitacorasseguimiento;
use App\Models\enteconformadores;
use App\Models\evidenciasbitacoras;
use App\Models\fichasdecaracterizacion;
use App\Models\instructores;
use App\Models\programasdeformacion;
use App\Models\subtiposalternativa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Log;

class BitacorasSeguimientosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bitacora = bitacorasseguimiento::all();
        return view('BitacorasSeguimientos.index', compact('bitacora'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $instructor = instructores::all();
        $ente = enteconformadores::all();
        $tipoalternativa = alternativasetapapoductiva::all();
        $subtipoalternativa = subtiposalternativa::all();
        $programas = programasdeformacion::all();
        $bitacora = bitacorasseguimiento::all();
        $aprendices = aprendices::all();
        $fichas = fichasdecaracterizacion::all();
        return view('BitacorasSeguimientos.create', compact('bitacora', 'instructor', 'programas', 'ente', 'tipoalternativa', 'subtipoalternativa', 'aprendices', 'fichas'));
    }

    /**
     *   
     */

    public function store(Request $request)
{


        $request->validate([

            // Campos principales
            'BitacoraNumero' => ['required'],
            'ProgramaFormacion_NIS' => ['required'],
            'FichaCaracterizacion_NIS' => ['required'],
            'EnteConformador_NIS' => ['required'],
            'Instructor_NIS' => ['required'],
            'TipoAlternativa_NIS' => ['required'],
            'SubtipoAlternativa' => ['required'],
            'AfiliadoArl' => ['required'],
            'NivelRiesgo' => ['required'],
            'NivelRiesgoCorresponde' => ['required'],
            'CuentaConEPP' => ['required'],

            // Firmas (archivos)
            'FirmaAprendiz' => ['required', 'file', 'mimes:jpg,png,pdf', 'max:2048'],
            'FirmaInstructor' => ['required', 'file', 'mimes:jpg,png,pdf', 'max:2048'],
            'firmaJefeInmediato' => ['required', 'file', 'mimes:jpg,png,pdf', 'max:2048'],

            // Arrays evidencias
            'FechaInicioActividad' => ['required', 'array', 'min:1'],
            'FechaInicioActividad.*' => ['required', 'date'],

            'FechaFinActividad' => ['required', 'array', 'min:1'],
            'FechaFinActividad.*' => ['required', 'date'],

            'DescripcionActividad' => ['required', 'array', 'min:1'],
            'DescripcionActividad.*' => ['required', 'string'],

            'Observaciones' => ['required', 'array'],
            'Observaciones.*' => ['nullable', 'string'],

            'EvidenciaCumplimiento' => ['required', 'array', 'min:1'],
            'EvidenciaCumplimiento.*' => ['required', 'file', 'mimes:jpg,png,pdf', 'max:2048'],
        ]);

        DB::beginTransaction();

        try {

            // 1️⃣ Crear bitácora principal
            $bitacora = bitacorasseguimiento::create([
                'BitacoraNumero' => $request->BitacoraNumero,
                'Aprendiz_NIS' => $request->Aprendiz_NIS,
                'ProgramaFormacion_NIS' => $request->ProgramaFormacion_NIS,
                'EnteConformador_NIS' => $request->EnteConformador_NIS,
                'Instructor_NIS' => $request->Instructor_NIS,
                'TipoAlternativa_NIS' => $request->TipoAlternativa_NIS,
                'SubtipoAlternativa' => $request->SubtipoAlternativa,
                'AfiliadoArl' => $request->AfiliadoArl,
                'NivelRiesgo' => $request->NivelRiesgo,
                'NivelRiesgoCorresponde' => $request->NivelRiesgoCorresponde,
                'CuentaConEPP' => $request->CuentaConEPP,
                'FirmaAprendiz' => 1,
                'FirmaInstructor' => 1,
                'firmaJefeInmediato' => 1,
            ]);

            // 2️⃣ Obtener arrays
            $fechasInicio = $request->input('FechaInicioActividad', []);
            $fechasFin = $request->input('FechaFinActividad', []);
            $descripciones = $request->input('DescripcionActividad', []);
            $observaciones = $request->input('Observaciones', []);
            $archivos = $request->file('EvidenciaCumplimiento', []);

            // 3️⃣ Guardar detalle
            foreach ($descripciones as $index => $descripcion) {

                $rutaArchivo = null;

                if (isset($archivos[$index])) {
                    $rutaArchivo = $archivos[$index]
                        ->store('evidencias', 'public');
                }

                evidenciasbitacoras::create([
                    'FechaInicioActividad' => $fechasInicio[$index] ?? null,
                    'FechaFinActividad' => $fechasFin[$index] ?? null,
                    'DescripcionActividad' => $descripcion,
                    'EvidenciaCumplimiento' => $rutaArchivo,
                    'Observaciones' => $observaciones[$index] ?? null,
                    'tblbitacorasseguimiento_NIS' => $bitacora->id, // usa el ID real
                ]);
            }

            DB::commit();

            return redirect()->back()->with('success', 'Registro guardado correctamente');
        } catch (\Exception $e) {

            Log::error('Error en store Bitacora:', [
                'mensaje' => $e->getMessage(),
                'traza' => $e->getTraceAsString(),
            ]);

            return back()->with('error', $e->getMessage());
        }
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($NIS)
    {
        $bitacora = bitacorasseguimiento::findOrFail($NIS);
        return view('BitacorasSeguimientos.edit', compact('bitacora'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIS)
    {
        $request->validate([
            'FechaInicioPeriodo' => 'required',
            'FechaFinPeriodo' => 'required',
            'BitacoraNumero' => 'required',
            'Aprendiz_NIS' => 'required',
            'ProgramaFormacion_NIS' => 'required',
            'EnteConformador_NIS' => 'required',
            'Instructor_NIS' => 'required',
            'TipoAlternativa_NIS' => 'required',
            'SubtipoAlternativa' => 'required',
            'DescripcionActividad' => 'required',
            'EvidenciaCumplimiento' => 'required',
            'Observaciones' => 'required',
            'AfiliadoArl' => 'required',
            'NivelRiesgo' => 'required',
            'NivelRiesgoCorresponde' => 'required',
            'CuentaConEPP' => 'required',
            'FirmaAprendiz' => 'required',
            'FirmaInstructor' => 'required',
            'firmaJefeInmediato' => 'required',

        ]);

        $bitacoras = bitacorasseguimiento::findOrFail($NIS);

        $bitacoras->update([
            'FechaInicioPeriodo' => $request->FechaInicioPeriodo,
            'FechaFinPeriodo' => $request->FechaFinPeriodo,
            'BitacoraNumero' => $request->BitacoraNumero,
            'Aprendiz_NIS' => $request->Aprendiz_NIS,
            'ProgramaFormacion_NIS' => $request->ProgramaFormacion_NIS,
            'EnteConformador_NIS' => $request->EnteConformador_NIS,
            'Instructor_NIS' => $request->Instructor_NIS,
            'TipoAlternativa_NIS' => $request->TipoAlternativa_NIS,
            'SubtipoAlternativa' => $request->SubtipoAlternativa,
            'DescripcionActividad' => $request->DescripcionActividad,
            'EvidenciaCumplimiento' => $request->EvidenciaCumplimiento,
            'Observaciones' => $request->Observaciones,
            'AfiliadoArl' => $request->AfiliadoArl,
            'NivelRiesgo' => $request->NivelRiesgo,
            'NivelRiesgoCorresponde' => $request->NivelRiesgoCorresponde,
            'CuentaConEPP' => $request->CuentaConEPP,
            'FirmaAprendiz' => $request->FirmaAprendiz,
            'FirmaInstructor' => $request->FirmaInstructor,
            'firmaJefeInmediato' => $request->firmaJefeInmediato,
        ]);

        return redirect()
            ->route('bitacorasseguimientos.index')
            ->with('success', 'Bitacora actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
    {
        $bitacoras = bitacorasseguimiento::findOrFail($NIS);
        $bitacoras->delete();

        return redirect()
            ->route('bitacorasseguimientos.index')
            ->with('success', 'Bitacora eliminada correctamente');
    }
}
