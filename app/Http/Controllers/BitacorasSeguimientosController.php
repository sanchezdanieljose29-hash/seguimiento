<?php

namespace App\Http\Controllers;

use App\Models\alternativasetapapoductiva;
use App\Models\bitacorasseguimiento;
use App\Models\enteconformadores;
use App\Models\evidenciasbitacoras;
use App\Models\instructores;
use App\Models\programasdeformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

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
        $programas = programasdeformacion::all();
        $bitacora = bitacorasseguimiento::all();
        return view('BitacorasSeguimientos.create', compact('bitacora', 'instructor', 'programas', 'ente', 'tipoalternativa'));
    }

    /**
     *   
     */
    public function store(Request $request)
    {


        $v = Validator::make($request->all(), [
            'BitacoraNumero' => ['required'],
            'Aprendiz_NIS' => ['required'],
            'ProgramaFormacion_NIS' => ['required'],
            'EnteConformador_NIS' => ['required'],
            'Instructor_NIS' => ['required'],
            'TipoAlternativa_NIS' => ['required'],
            'SubtipoAlternativa' => ['required'],
            'AfiliadoArl' => ['required'],
            'NivelRiesgo' => ['required'],
            'NivelRiesgoCorresponde' => ['required'],
            'CuentaConEPP' => ['required'],
            'FirmaAprendiz' => ['required'],
            'FirmaInstructor' => ['required'],
            'firmaJefeInmediato' => ['required'],

            // Datos detalle (arrays)
            'FechaInicioActividad' => ['required', Rule::date()->format('Y-m-d'),'array'],
            'FechaFinActividad' => ['required', Rule::date()->format('Y-m-d'),'array'],
            'DescripcionActividad' => ['required', 'array'],
            'EvidenciaCumplimiento' => ['required|file|mimes:jpg,png,pdf|max:2048', 'array'],
            'Observaciones' => ['required', 'array'],
        ]);




        if ($v->fails()) {

            return back()->with('errors', $v->errors());
        } else {

       // Guardar en storage/app/public
       //PRIMERO LOS ARCHIVOS
       $nombrearchivo = time() . 'evidencia' . $request->file('archivo')->extension();
    $observaciones = $request->file('archivo')->store('uploads', 'public', 'evidencias');
 
    
            DB::beginTransaction();

            //Crea Registro en la tabla de bitacoras

            $input = $request->all();
            $input['BitacoraNumero'] = $input['BitacoraNumero'];
            $input['Aprendiz_NIS'] = $input['Aprendiz_NIS'];
            $input['ProgramaFormacion_NIS'] = $input['ProgramaFormacion_NIS'];
            $input['EnteConformador_NIS'] = $input['EnteConformador_NIS'];
            $input['Instructor_NIS'] = $input['Instructor_NIS'];
            $input['TipoAlternativa_NIS'] = $input['TipoAlternativa_NIS'];
            $input['SubtipoAlternativa'] = $input['SubtipoAlternativa'];
            $input['AfiliadoArl'] = $input['AfiliadoArl'];
            $input['NivelRiesgo'] = $input['NivelRiesgo'];
            $input['NivelRiesgoCorresponde'] = $input['NivelRiesgoCorresponde'];
            $input['CuentaConEPP'] = $input['CuentaConEPP'];
            $input['FirmaAprendiz'] = 1;
            bitacorasseguimiento::create($input);

            // Obtener arrays
            $fechasInicio = $request->FechaInicioActividad;
            $fechasFin = $request->FechaFinActividad;
            $descripciones = $request->DescripcionActividad;
            $observaciones = $request->Observaciones;
            $archivos = $request->file('EvidenciaCumplimiento');

            foreach ($descripciones as $index => $descripcion) {

                // Guardar archivo si existe
                $rutaArchivo = null;

                if (isset($archivos[$index])) {
                    $rutaArchivo = $archivos[$index]->store('evidencias', 'public');
                }

                evidenciasbitacoras::create([
                    'FechaInicioActividad' => $fechasInicio[$index] ?? null,
                    'FechaFinActividad' => $fechasFin[$index] ?? null,
                    'DescripcionActividad' => $descripcion,
                    'EvidenciaCumplimiento' => $rutaArchivo,
                    'Observaciones' => $observaciones[$index] ?? null,
                    'bitacora_NIS' => $request->bitacora_NIS,
                    'tblbitacorasseguimiento_NIS' => $request->tblbitacorasseguimiento_NIS,
                ]);
            }







            return back()->with('success', 'Bitacora registrada con éxito');
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
