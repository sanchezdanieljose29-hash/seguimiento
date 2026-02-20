<?php

namespace App\Http\Controllers;

use App\Models\Regionales;
use App\Models\regionales as ModelsRegionales;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;


use function Laravel\Prompts\alert;

class RegionalesController extends Controller
{
    public function index()
    {
        $reg = Regionales::all();
        return view('Regionales.index', compact('reg'));
    }

    public function create()
    {
        return view('Regionales.create');
    }

    public function store(Request $request)
    {
    //PREPARA LA VALIDACIÓN PARA QUE LOS CAMPOS NO LLEGUEN VACIOS
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
      $input['password']=bcrypt($input['codigo'] );
     regionales::create($input);
   /*  $succesMsg="Usuario Creado con exito";
     alert('Muy bien' , 'Usuario registrado con exito');
     return back(); 
     */

     return back()->with('success', 'Usuario registrado con éxito');

    }

}

    /*

    public function store(Request $request)
    {



    
        $request->validate([
            'codigo' => 'required',
            'Denominacion' => 'required',
            'Observaciones' => 'required'
        ]);
      



        Regionales::create($request->only([
            'codigo',
            'Denominacion',
            'Observaciones'
        ]));

        return back()->with('success', 'Regional registrada con éxito');

    }

   
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
         $regional = Regionales::findOrFail($NIS);
    return view('Regionales.edit', compact('regional'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NIS)
    {
        

        $request->validate([
        'codigo' => 'required',
        'Denominacion' => 'required',
        'Observaciones' => 'required',
    ]);

    $regional = Regionales::findOrFail($NIS);

    $regional->update([
        'codigo' => $request->codigo,
        'Denominacion' => $request->Denominacion,
        'Observaciones' => $request->Observaciones,
    ]);

    return redirect()
        ->route('regionales.index')
        ->with('success', 'Regional actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $NIS)
    {
        $regional = Regionales::findOrFail($NIS);
        $regional->delete();

        return redirect()
        ->route('regionales.index')
        ->with('success','Regional Eliminada Correctamente');

    }
}
