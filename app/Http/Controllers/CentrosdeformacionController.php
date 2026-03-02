<?php

namespace App\Http\Controllers;

use App\Models\centrosdeformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CentrosdeformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $centros = centrosdeformacion::all();
        return view('CentrosFormacion.index', compact('centros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('CentrosFormacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //PREPARA LA VALIDACIÓN PARA QUE LOS CAMPOS NO LLEGUEN VACIOS
        $v = validator::make($request->all(), [
            'codigo' => ['required'],
            'Denominacion' => ['required'],
            'Direccion' => ['required'],
            'Observaciones' => ['required'],
            'tblregionales_NIS' => ['required']
        ]);

        if ($v->fails()) {

            return back()->with('errors', $v->errors());
        } else {


            $input = $request->all();
            $input['codigo'] = $input['codigo'];
            $input['Denominacion'] = $input['Denominacion'];
            $input['Direccion'] = $input['Direccion'];
            $input['Observaciones'] = $input['Observaciones'];
            $input['tblregionales_NIS'] = $input['tblregionales_NIS'];
            centrosdeformacion::create($input);

            return back()->with('success', 'Centro de formación registrado con éxito');
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
        $centros = centrosdeformacion::findOrFail($NIS);
        return view('CentrosFormacion.edit', compact('centros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIS)
    {

        $request->validate([
            'codigo' => 'required',
            'Denominacion' => 'required',
            'Direccion' => 'required',
            'Observaciones' => 'required',
            'tblregionales_NIS' => 'required',
        ]);

        $centros = centrosdeformacion::findOrFail($NIS);

        $centros->update([
            'codigo' => $request->codigo,
            'Denominacion' => $request->Denominacion,
            'Direccion' => $request->Direccion,
            'Observaciones' => $request->Observaciones,
            'tblregionales_NIS' => $request->tblregionales_NIS,
        ]);

        return redirect()
            ->route('centrosformacion.index')
            ->with('success', 'Centro de formación actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
    {
        $centros = centrosdeformacion::findOrFail($NIS);
        $centros->delete();
        return redirect()
            ->route('centrosformacion.index')
            ->with('success', 'Centro de formación eliminado correctamente');
    }
}
