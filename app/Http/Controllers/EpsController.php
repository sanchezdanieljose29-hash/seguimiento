<?php

namespace App\Http\Controllers;

use App\Models\eps;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EpsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $eps = eps::all();

        return view('EPS.index', compact('eps'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('EPS.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $v = Validator::make($request->all(), [
            'Numdoc' => ['required'],
            'Denominacion' => ['required'],
            'Observaciones' => ['required'],
            
        ]);

        if ($v->fails()) {
            return back()
                ->withErrors($v)
                ->withInput();
        }

        eps::create($request->only([
            'Numdoc',
            'Denominacion',
            'Observaciones',
            
        ]));

        return redirect()
            ->route('eps.index')
            ->with('success', 'EPS registrada con éxito');
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
        $eps = eps::findOrFail($NIS);

        return view('EPS.edit', compact('eps'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $NIS)
    {
        $eps = eps::findOrFail($NIS);

        $request->validate([
            'Numdoc' => 'required',
            'Denominacion' => 'required',
            'Observaciones' => 'required',
            
            
        ]);

        $eps->update([
            
            'Numdoc' => $request->Ndoc,
            'Denominacion' => $request->Denominacion,
            'Observaciones' => $request->Observaciones,
           
        ]);

        return redirect()
            ->route('eps.index')
            ->with('success', 'EPS actualizada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($NIS)
    {
        $eps = eps::findOrFail($NIS);
        $eps->delete();

        return redirect()
            ->route('eps.index')
            ->with('success', 'EPS eliminada correctamente');
    }
}