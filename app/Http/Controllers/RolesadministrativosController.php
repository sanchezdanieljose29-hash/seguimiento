<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('rolesadministrativos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
