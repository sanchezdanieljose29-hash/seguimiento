<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class PerfilCompleto
{
    public function handle(Request $request, Closure $next)
    {
        $usuario = Auth::user();

        if (!$usuario) return $next($request);

        // ✅ Para Aprendices
        if ($usuario->hasRole('aprendiz')) {

            $aprendiz = DB::table('tblaprendices')
                ->where('Usuarios_NIS', $usuario->NIS)
                ->first();

            $perfilIncompleto = !$aprendiz
                || empty($aprendiz->Telefono)
                || empty($aprendiz->Direccion)
                || empty($aprendiz->FechaNac)
                || empty($aprendiz->Sexo)
                || empty($aprendiz->Eps_NIS);

            if ($perfilIncompleto && !$request->routeIs('aprendiz.completar-perfil')) {
                return redirect()->route('aprendiz.completar-perfil')
                    ->with('info', 'Debes completar tu perfil antes de continuar.');
            }
        }

        // ✅ Para Instructores
        if ($usuario->hasRole('instructor')) {

            $instructor = DB::table('tblinstructores')
                ->where('Usuarios_NIS', $usuario->NIS)
                ->first();

            $perfilIncompleto = !$instructor
                || empty($instructor->Telefono)
                || empty($instructor->Direccion)
                || empty($instructor->FechaNac)
                || empty($instructor->Sexo)
                || empty($instructor->Eps_NIS);

            if ($perfilIncompleto && !$request->routeIs('instructor.completar-perfil')) {
                return redirect()->route('instructor.completar-perfil')
                    ->with('info', 'Debes completar tu perfil antes de continuar.');
            }
        }

        return $next($request);
    }
}
