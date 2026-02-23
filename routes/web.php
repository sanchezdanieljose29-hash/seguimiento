<?php

use App\Http\Controllers\AprendicesController;
use App\Http\Controllers\EpsController;
use App\Http\Controllers\FichasdecaracterizacionController;
use App\Http\Controllers\ProgramasdeformacionController;
use App\Http\Controllers\RegionalesController;
use App\Http\Controllers\RolesadministrativosController;
use App\Http\Controllers\TiposdocumentosController;
use App\Models\rolesadministrativos;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboar');
});

    Route::resource('regionales', RegionalesController::class);

    Route::resource('aprendices', AprendicesController::class);

    Route::resource('programasdeformacion', ProgramasdeformacionController::class);

    Route::resource('eps', EpsController::class);

    Route::resource('tiposdedocumentos', TiposdocumentosController::class);

    Route::resource('rolesadministrativos', RolesadministrativosController::class);

    Route::resource('fichasdecaracterizacion', FichasdecaracterizacionController::class);

  

