<?php

namespace App\Http\Controllers;

use App\Models\subtiposalternativa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubTiposAlternativaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subtipo = subtiposalternativa::all();
        return view('SubTipoAlternativa.index', compact('subtipo'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('SubTipoAlternativa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //PREPARA LA VALIDACIÓN PARA QUE LOS CAMPOS NO LLEGUEN VACIOS
        $v = validator::make($request->all(), [
            'alternativaNIS' => ['required'],
            'nombre' => ['required']
        ]);

        if ($v->fails()) {

            return back()->with('errors', $v->errors());
        } else {

            $input = $request->all();
            $input['alternativaNIS'] = $input['alternativaNIS'];
            $input['nombre'] = $input['nombre'];

            subtiposalternativa::create($input);

            return back()->with('success', 'Subtipo de alternativa registrado con éxito');
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
        $subtipo = subtiposalternativa::findOrFail($NIS);
        return view('SubTipoAlternativa.edit', compact('subtipo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIS)
    {
        $request->validate([
            'alternativaNIS' => 'required',
            'nombre' => 'required',
        ]);

        $subtipo = subtiposalternativa::findOrFail($NIS);

        $subtipo->update([
            'alternativaNIS' => $request->alternativaNIS,
            'nombre' => $request->nombre,
        ]);

        return redirect()
            ->route('subtipoalternativa.index')
            ->with('success', 'Subtipo de alternativa actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
    {
        $subtipo = subtiposalternativa::findOrFail($NIS);
        $subtipo->delete();

        return redirect()
            ->route('subtipoalternativa.index')
            ->with('success', 'Subtipo de alternativa Eliminado Correctamente');
    }
}
