<?php

namespace App\Http\Controllers;

use App\Models\fichasdecaracterizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class FichasdecaracterizacionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fichas = DB::select('SELECT * FROM bd_seguimientos.tblfichasdecaracterizacion;');
        return view('FichaCaracterizacion.index', compact('fichas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('FichaCaracterizacion.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //PREPARA LA VALIDACIÓN PARA QUE LOS CAMPOS NO LLEGUEN VACIOS
     $v = validator::make($request -> all(), [ 
     'codigo' => ['required'],
     'Denominacion' => ['required'],
     'Cupo' => ['required'],
     'FechaInicio' => ['required'],
     'FechaFin' => ['required'],
     'Direccion' => ['required'],
     'Observaciones' => ['required'],
     'tblprogramasdeformacion_NIS' => ['required'],
     'tblcentrosdeformacion_NIS' => ['required']
     ]);

    
     if ($v->fails()) {

return back()->with('errors', $v->errors());

     }
else {

     $input=$request->all();
     $input['codigo'] = $input['codigo'];
      $input['Denominacion'] = $input['Denominacion'];
      $input['Cupo'] = $input['Cupo'];
      $input['FechaInicio'] = $input['FechaInicio'];
      $input['FechaFin'] = $input['FechaFin'];
      $input['Direccion'] = $input['Direccion'];
      $input['Observaciones'] = $input['Observaciones'];
      $input['tblprogramasdeformacion_NIS'] = $input['tblprogramasdeformacion_NIS'];
      $input['tblcentrosdeformacion_NIS'] = $input['tblcentrosdeformacion_NIS'];
      
     fichasdecaracterizacion::create($input);
   /*  $succesMsg="Usuario Creado con exito";
     alert('Muy bien' , 'Usuario registrado con exito');
     return back(); 
     */

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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
