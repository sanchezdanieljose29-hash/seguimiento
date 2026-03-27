<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CrearUsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('Admin.CrearUsuario.index');
    }

    public function create()
    {
        return view('Admin.CrearUsuario.create');
    }
}
