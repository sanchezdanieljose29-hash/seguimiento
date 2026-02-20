<?php

namespace App\Http\Controllers;

use App\Models\tiposdocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TiposdocumentosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Tipos = tiposdocumentos::all();

        return view('TiposDocu.index', compact('Tipos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('TiposDocu.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'Denominacion' => ['required'],
            'Observaciones' => ['required'],
        ]);

        if ($v->fails()) {
            return back()
                ->withErrors($v)
                ->withInput();
        }

        tiposdocumentos::create($request->only([
            'Denominacion',
            'Observaciones'
        ]));

        return redirect()
            ->route('tiposdedocumentos.index')
            ->with('success', 'Tipo de documento registrado con éxito');
    }

    /**
     * Display the specified resource.
     */
    public function show($NIS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($NIS)
    {
        $Tipo = tiposdocumentos::findOrFail($NIS);

        return view('TiposDocu.edit', compact('Tipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NIS)
    {
        $Tipo = tiposdocumentos::findOrFail($NIS);

        $request->validate([
            'Denominacion' => 'required',
            'Observaciones' => 'required',
        ]);

        $Tipo->update([
            'Denominacion' => $request->Denominacion,
            'Observaciones' => $request->Observaciones,
        ]);

        return redirect()
            ->route('tiposdedocumentos.index')
            ->with('success', 'Tipo de documento actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($NIS)
    {
        $Tipo = tiposdocumentos::findOrFail($NIS);
        $Tipo->delete();

        return redirect()
            ->route('tiposdedocumentos.index')
            ->with('success', 'Tipo de documento eliminado correctamente');
    }
}