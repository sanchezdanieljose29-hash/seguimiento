<?php

namespace App\Http\Controllers;

use App\Models\alternativasetapapoductiva;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AlternativaEtapaProducticaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternativa = alternativasetapapoductiva::all();
        return view('AlternativaEtapaProductiva.index', compact('alternativa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('AlternativaEtapaProductiva.create');
    }

    /**
   
     */
    public function store(Request $request)
    {
        //PREPARA LA VALIDACIÓN PARA QUE LOS CAMPOS NO LLEGUEN VACIOS
        $v = validator::make($request->all(), [
            'Denominacion' => ['required'],
            'descripcion' => ['required'],

        ]);

        if ($v->fails()) {

            return back()->with('errors', $v->errors());
        } else {
            $input = $request->all();
            $input['Denominacion'] = $input['Denominacion'];
            $input['descripcion'] = $input['descripcion'];


            alternativasetapapoductiva::create($input);

            return back()->with('success', 'Alternativa registrada con éxito');
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
        $alternativa = alternativasetapapoductiva::findOrFail($NIS);
        return view('AlternativaEtapaProductiva.edit', compact('alternativa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIS)
    {
        $request->validate([
            'Denominacion' => 'required|sometimes',
            'descripcion' => 'required|sometimes',


        ]);

        $alternativa = alternativasetapapoductiva::findOrFail($NIS);

        $alternativa->update([
            'Denominacion' => $request->Denominacion,
            'descripcion' => $request->descripcion,

        ]);

        return redirect()
            ->route('alternativaetapa.index')
            ->with('success', 'Alternativa actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
    {
        $alternativa = alternativasetapapoductiva::findOrFail($NIS);
        $alternativa->delete();

        return redirect()
            ->route('alternativaetapa.index')
            ->with('success', 'Alternativa Eliminada Correctamente');
    }
}
