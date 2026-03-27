<?php

namespace App\Http\Controllers;

use App\Models\Aprendices;
use App\Models\eps;
use App\Models\fichasdecaracterizacion;
use App\Models\Sexo;
use App\Models\Tiposdocumentos;
use App\Models\tiposdocumentos as ModelsTiposdocumentos;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AutenticacionController extends Controller
{
    public function showRegister()
    {
        $tipodocumentos = Tiposdocumentos::all();

        return view('Auth.register', compact('tipodocumentos'));
    }

    public function showLogin()
    {
        $tipodocumentos = Tiposdocumentos::all();
        return view('Auth.login', compact('tipodocumentos'));
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            // Datos para tblusuarios
            'Tdoc' => 'required|exists:tbltiposdocumentos,NIS',
            'Ndoc' => 'required|string|max:15|unique:tblusuarios,Ndoc',

        ]);

        // 1. Crear usuario en tblusuarios
        $usuario = User::create([
            'Tdoc' => $validated['Tdoc'],
            'Ndoc' => $validated['Ndoc'],
            'password_cifrado' => Hash::make($validated['Ndoc']), // Ndoc como contraseña
            'activo' => true,
        ]);

        Auth::login($usuario);

        return redirect()->route('showLogin')
            ->with('success', 'Aprendiz registrado con éxito');
    }

   public function login(Request $request)
{
    $request->validate([
        'Tdoc' => 'required|exists:tbltiposdocumentos,NIS',
        'Ndoc' => 'required|string',
        'password' => 'required|string'
    ]);

    // Buscar usuario por tipo y número de documento
    $usuario = User::where('Tdoc', $request->Tdoc)
        ->where('Ndoc', $request->Ndoc)
        ->first();

    if ($usuario && Hash::check($request->password, $usuario->password_cifrado)) {

        Auth::login($usuario);
        $request->session()->regenerate();

        // Redirección según rol
        if ($usuario->hasRole('admin')) {
            return redirect()->route('admin.dashboard');
        }

        if ($usuario->hasRole('instructor')) {
            return redirect()->route('instructor.dashboard');
        }

        if ($usuario->hasRole('aprendiz')) {
            return redirect()->route('aprendiz.dashboard');
        }

        // Si no tiene rol conocido
        return redirect('/')->with('error','El usuario no tiene un rol asignado.');
    }

    throw ValidationException::withMessages([
        'Ndoc' => 'Las credenciales proporcionadas son incorrectas.',
    ]);
}

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
