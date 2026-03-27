<?php

namespace App\Http\Controllers\Aprendices;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AprendicesDashboard extends Controller
{
    public function index()
    {
        return view('Aprendiz.dashboard');
    }
}
