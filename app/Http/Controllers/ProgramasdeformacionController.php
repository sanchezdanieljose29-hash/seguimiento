<?php

namespace App\Http\Controllers;

use App\Models\programasdeformacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProgramasdeformacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $programasdeformacion = programasdeformacion::all();

     return view('ProgramasFormacion.index', compact('programasdeformacion'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('ProgramasFormacion.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $v = validator::make($request -> all(), [ 
     'codigo' => ['required'],
     'Denominacion' => ['required'],
     'Observaciones' => ['required']
     ]);

     if ($v->fails()) {

return back()->with('errors', $v->errors());

     }
else {

     $input=$request->all();
     $input['codigo'] = $input['codigo'];
      $input['Denominacion'] = $input['Denominacion'];
      $input['Observaciones'] = $input['Observaciones'];
     

     programasdeformacion::create($input);
   /*  $succesMsg="Usuario Creado con exito";
     alert('Muy bien' , 'Usuario registrado con exito');
     return back(); 
     */

     return back()->with('success', 'Programa registrado con éxito');

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
        $programasdeformacion = programasdeformacion::findOrFail($NIS);
    return view('ProgramasFormacion.edit', compact('programasdeformacion'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NIS)
    {
        $programasdeformacion = programasdeformacion::findOrFail($NIS);

    $programasdeformacion->update([
        'codigo' => $request->codigo,
        'Denominacion' => $request->Denominacion,
        'Observaciones' => $request->Observaciones,
    ]);

    return redirect()
        ->route('programasdeformacion.index')
        ->with('success', 'Programa actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $NIS)
    {
        $programasdeformacion = programasdeformacion::findOrFail($NIS);
        $programasdeformacion->delete();

        return redirect()
        ->route('programasdeformacion.index')
        ->with('success','Programa Eliminado Correctamente');

    }
}
