<?php

namespace App\Http\Controllers;

use App\Models\instructores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstructoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $instructores = instructores::all();
        return view('instructores.index', compact('instructores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('instructores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {



        //PREPARA LA VALIDACIÓN PARA QUE LOS CAMPOS NO LLEGUEN VACIOS
        $v = validator::make($request->all(), [
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
            'tblrolesadministrativos_NIS' => ['required'],

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
            $input['tblrolesadministrativos_NIS'] = $input['tblrolesadministrativos_NIS'];
            instructores::create($input);

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
        $instructores = instructores::findOrFail($NIS);
        return view('Instructores.edit', compact('instructores'));
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
            'tblrolesadministrativos_NIS' => 'required',
        ]);

        $instructores = instructores::findOrFail($NIS);

        $instructores->update([
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
            'tblrolesadministrativos_NIS' => $request->tblrolesadministrativos_NIS,
        ]);

        return redirect()
            ->route('instructores.index')
            ->with('success', 'Regional actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
    {
        $instructores = instructores::findOrFail($NIS);
        $instructores->delete();

        return redirect()
            ->route('instructores.index')
            ->with('success', 'Instructor Eliminado Correctamente');
    }
}
