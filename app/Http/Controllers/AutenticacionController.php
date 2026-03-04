<?php

namespace App\Http\Controllers;

use App\Models\Aprendices;
use App\Models\Eps;
use App\Models\Tiposdocumentos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AutenticacionController extends Controller
{
    public function showRegister()
    {
        $tipodocumentos = Tiposdocumentos::all();
        return view('auth.register', compact('tipodocumentos'));
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'Nombres' => 'required|string|max:100',
            'Apellidos' => 'required|string|max:100',
            'tbltiposdocumentos_NIS' => 'required|exists:tbltiposdocumentos,id',
            'Ndoc' => 'required|string|max:20|unique:tblaprendices,Ndoc',
            'Direccion' => 'required|string|max:255',
            'Telefono' => 'required|string|max:20',
            'CorreoInstitucional' => 'required|email|unique:tblaprendices,CorreoInstitucional',
            'CorreoPersonal' => 'required|email',
            'Sexo' => 'required|in:M,F,Otro',
            'FechaNac' => 'required|date',
            'tbleps_NIS' => 'required|exists:tbleps,id',
        ]);

        // Encriptar contraseña (por defecto será el documento)
        $validated['password'] = bcrypt($validated['Ndoc']);

        $aprendiz = Aprendices::create($validated);

        Auth::login($aprendiz);

        return redirect()->route('dashboard')
            ->with('success', 'Usuario registrado con éxito');
    }

   public function login(Request $request)
{
    $request->validate([
        'Ndoc' => 'required|string',
        'password' => 'required|string'
    ]);

    $credentials = [
        'Ndoc' => $request->Ndoc,
        'password' => $request->password
    ];

    if (Auth::attempt($credentials)) {

        $request->session()->regenerate();

        // 🔥 Redirección según rol (opcional pero recomendado)
        $user = Auth::user();

        if ($user->role === 'aprendiz') {
            return redirect()->route('aprendiz.dashboard');
        }

        if ($user->role === 'instructor') {
            return redirect()->route('instructor.dashboard');
        }

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('dashboard');
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