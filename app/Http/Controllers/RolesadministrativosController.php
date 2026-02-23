<?php

namespace App\Http\Controllers;

use App\Models\rolesadministrativos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class RolesadministrativosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*PRIMERO DEBES INSTACIAR LA CLASE DB (use Illuminate\Support\Facades\DB;)
        SEGUNDO: DECLARAR LA VARIABLES EN DONDE SE QUIERE ALMACENAR LA CONSULTA SQL
        TERCERO: USAR DB::SELECT PARA...
        CUARTO: RETORNAR LA VISTA JUNTO AL PARAMENTRO
        */

        $roles = DB::select('SELECT * FROM bd_seguimientos.tblrolesadministrativos;');

        return view('RolesAdministrativos.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Rolesadministrativos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    $v = Validator::make($request -> all(), [ 
     
     'Descripcion' => ['required'],
    
     ]);

       if ($v->fails()) {

return back()->with('errors', $v->errors());

     }
else {

     $input=$request->all();
    
      $input['Descripcion'] = $input['Descripcion'];
     
     rolesadministrativos::create($input);
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
    public function show(string $NIS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $NIS)
    {
         $roles = rolesadministrativos::findOrFail($NIS);   
    return view('RolesAdministrativos.edit', compact('roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $NIS)
    {
        
        $request->validate([
        'Descripcion' => 'required',
        
    ]);

    $regional = rolesadministrativos::findOrFail($NIS);

    $regional->update([
        'Descripcion' => $request->Descripcion,
        
    ]);

    return redirect()
        ->route('rolesadministrativos.index')
        ->with('success', 'Rol Actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $NIS)
    {
        $roles = rolesadministrativos::findOrFail($NIS);
        $roles->delete();

        return redirect()
        ->route('RolesAdministrativos.index')
        ->with('success','Regional Eliminada Correctamente');

    }
    }

