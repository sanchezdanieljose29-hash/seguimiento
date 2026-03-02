<?php

namespace App\Http\Controllers;

use App\Models\enteconformadores;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EnteconformadoresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $entes = enteconformadores::all();
    return view('EntesConformadores.index', compact('entes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('EntesConformadores.create');
    }

    /**
     * 
     */
    public function store(Request $request)
    {
        //PREPARA LA VALIDACIÓN PARA QUE LOS CAMPOS NO LLEGUEN VACIOS
        $v = validator::make($request->all(), [
            'Tdoc' => ['required'],
            'Ndoc' => ['required'],
            'RazonSocial' => ['required'],
            'Direccion' => ['required'],
            'Telefono' => ['required'],
            'CorreoInstitucional' => ['required']
        ]);

        if ($v->fails()) {

            return back()->with('errors', $v->errors());
        } else {

        $input = $request->all();
            $input['Tdoc'] = $input['Tdoc'];
            $input['Ndoc'] = $input['Ndoc'];
            $input['RazonSocial'] = $input['RazonSocial'];
            $input['Direccion'] = $input['Direccion'];
            $input['Telefono'] = $input['Telefono'];
            $input['CorreoInstitucional'] = $input['CorreoInstitucional'];
            enteconformadores::create($input);

            return back()->with('success', 'Ente Conformador registrado con éxito');
    }

    }

    /**
     * Display the specified resource.
     */
    public function show(enteconformadores $NIS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $NIS)
    {
        
        $entes = enteconformadores::findOrFail($NIS);
        return view('EntesConformadores.edit', compact('entes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIS)
    {
        $request->validate([
            'Tdoc' => 'required',
            'Ndoc' => 'required',
            'RazonSocial' => 'required',
            'Direccion' => 'required',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required'
        ]);

        $entes = enteconformadores::findOrFail($NIS);

        

        $entes->update([
            'Tdoc' => $request->Tdoc,
            'Ndoc' => $request->Ndoc,
            'RazonSocial' => $request->RazonSocial,
            'Direccion' => $request->Direccion,
            'Telefono' => $request->Telefono,
            'CorreoInstitucional' => $request->CorreoInstitucional
        ]);

        return redirect()
            ->route('enteconformadores.index')
            ->with('success', 'Ente Conformador actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
    {
        $entes = enteconformadores::findOrFail($NIS);
        $entes->delete();

        return redirect()
            ->route('enteconformadores.index')
            ->with('success', 'Ente Conformador Eliminado Correctamente');
    }
}
