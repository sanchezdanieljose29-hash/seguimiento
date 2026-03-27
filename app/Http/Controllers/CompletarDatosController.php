<?php

namespace App\Http\Controllers;

use App\Models\eps;
use App\Models\fichasdecaracterizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompletarDatosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $usuario = Auth::user();

    $aprendices = DB::table('tblaprendices')
        ->where('Usuarios_NIS', $usuario->NIS)
        ->first();

        $eps = eps::all();
        $fichas =fichasdecaracterizacion::all();
        return view('Aprendices.edit', compact('aprendices','eps','fichas'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = Auth::user();

        // Validación básica
        $request->validate([
            'Ficha_NIS' => 'required',
            'Direccion' => 'required',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required',
            'Sexo' => 'required',
            'FechaNac' => 'required|date',
            'Eps_NIS' => 'required'
        ]);

        // Insertar directamente (asumiendo que no existe aún)
        DB::table('tblaprendices')->updateOrInsert(
            ['Usuarios_NIS' => $usuario->NIS],
            [
                'Ficha_NIS' => $request->Ficha_NIS,
                'Direccion' => $request->Direccion,
                'Telefono' => $request->Telefono,
                'CorreoInstitucional' => $request->CorreoInstitucional,
                'Sexo' => $request->Sexo,
                'FechaNac' => $request->FechaNac,
                'Eps_NIS' => $request->Eps_NIS,
            ]
        );

        // 🔁 Redirigir al dashboard de aprendices
        return redirect()->route('aprendiz.dashboard');
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
