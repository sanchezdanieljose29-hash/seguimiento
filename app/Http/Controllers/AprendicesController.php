<?php

namespace App\Http\Controllers;

use App\Models\aprendices;
use App\Models\eps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AprendicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $aprendices = aprendices::all();
        return view('Aprendices.index', compact('aprendices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        // Obtiene TODOS los registros de la misma tabla para llenar el select
        $aprendices = eps::all();
        return view('Aprendices.create', compact('aprendices'));
        // Obtiene el registro específico que vamos a editar


    }

    /**
     * NIS, Nombres, Apellidos, tbltiposdocumentos_NIS, Ndoc, Direccion, Telefono, CorreoInstitucional, CorreoPersonal, Sexo, FechaNac, tbleps_NIS
     */
    public function store(Request $request)
    {

        $v = Validator::make($request->all(), [
            'Nombres' => ['required'],
            'Apellidos' => ['required'],
            'tbltiposdocumentos_NIS' => ['required'],
            'Ndoc' => ['required'],
            'Direccion' => ['required'],
            'Telefono' => ['required'],
            'CorreoInstitucional' => ['required'],
            'CorreoPersonal' => ['required'],
            'Sexo' => ['required'],
            'FechaNac' => ['required'],
            'tbleps_NIS' => ['required'],
        ]);

        if ($v->fails()) {

            return back()->with('errors', $v->errors());
        } else {



            $input = $request->all();
            $input['Nombres'] = $input['Nombres'];
            $input['Apellidos'] = $input['Apellidos'];
            $input['tbltiposdocumentos_NIS'] = $input['tbltiposdocumentos_NIS'];
            $input['Ndoc'] = $input['Ndoc'];
            $input['Direccion'] = $input['Direccion'];
            $input['Telefono'] = $input['Telefono'];
            $input['CorreoInstitucional'] = $input['CorreoInstitucional'];
            $input['CorreoPersonal'] = $input['CorreoPersonal'];
            $input['Sexo'] = $input['Sexo'];
            $input['FechaNac'] = $input['FechaNac'];
            $input['tbleps_NIS'] = $input['tbleps_NIS'];
            aprendices::create($input);

            return back()->with('success', 'Usuario registrado con éxito');
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
    public function edit(string $NIS)
    {
        $aprendices = aprendices::findOrFail($NIS);
        return view('Aprendices.edit', compact('aprendices'));
    }

    /**
     * 
     */
    public function update(Request $request, string $NIS)
    {
        $request->validate([
            'Nombres' => 'required',
            'Apellidos' => 'required',
            'tbltiposdocumentos_NIS' => 'required',
            'Ndoc' => 'required',
            'Direccion' => 'required',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required',
            'CorreoPersonal' => 'required',
            'Sexo' => 'required',
            'FechaNac' => 'required',
            'tbleps_NIS' => 'required',
        ]);

        $aprendices = aprendices::findOrFail($NIS);

        $aprendices->update([
            'Nombres' => $request->Nombres,
            'Apellidos' => $request->Apellidos,
            'tbltiposdocumentos_NIS' => $request->tbltiposdocumentos_NIS,
            'Ndoc' => $request->Ndoc,
            'Direccion' => $request->Direccion,
            'Telefono' => $request->Telefono,
            'CorreoInstitucional' => $request->CorreoInstitucional,
            'CorreoPersonal' => $request->CorreoPersonal,
            'Sexo' => $request->Sexo,
            'FechaNac' => $request->FechaNac,
            'tbleps_NIS' => $request->tbleps_NIS, 
        ]);

        return redirect()
            ->route('aprendices.index')
            ->with('success', 'aprendiz actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
    {
        $aprendiz = aprendices::findOrFail($NIS);
        $aprendiz->delete();

        return redirect()
            ->route('aprendices.index')
            ->with('success', 'Aprendiz eliminado correctamente');
    }
}
