<?php

namespace App\Http\Controllers;

use App\Models\eps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CompletarDatosInstructores extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eps = eps::all();
        return view('Instructores.edit', compact('eps'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = Auth::user();

        // Validación básica
        $request->validate([
            'Direccion' => 'required',
            'Telefono' => 'required',
            'CorreoInstitucional' => 'required|date',
            'Sexo' => 'required',
            'FechaNac' => 'required',
            'EPS_NIS' => 'required'

        ]);

        // Insertar directamente (asumiendo que no existe aún)
        DB::table('tblinstructores')->updateOrInsert(
            ['Usuarios_NIS' => $usuario->NIS],
            [
                'Direccion' => $request->Direccion,
                'Telefono' => $request->Telefono,
                'CorreoInstitucional' => $request->CorreoInstitucional,
                'Sexo' => $request->Sexo,
                'FechaNa' => $request->FechaNa,
                'EPS_NIS' => $request->EPS_NIS
            ]
        );

        // 🔁 Redirigir al dashboard de aprendices
        return redirect()->route('instructor.dashboard');
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
