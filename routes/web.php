<?php

use App\Http\Controllers\AlternativaEtapaProducticaController;
use App\Http\Controllers\BitacorasSeguimientosController;
use App\Http\Controllers\CentrosdeformacionController;
use App\Http\Controllers\AprendicesController;
use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\EpsController;
use App\Http\Controllers\FichasdecaracterizacionController;
use App\Http\Controllers\ProgramasdeformacionController;
use App\Http\Controllers\RegionalesController;
use App\Http\Controllers\RolesadministrativosController;
use App\Http\Controllers\TiposdocumentosController;
use App\Http\Controllers\EnteconformadoresController;
use App\Http\Controllers\InstructoresController;
use App\Http\Controllers\SubTiposAlternativaController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('dashboar');
});

Route::get('/register', [AutenticacionController::class, 'showRegister'])->name('showRegister');
Route::get('/login', [AutenticacionController::class, 'showLogin'])->name('showLogin');

Route::post('/register', [AutenticacionController::class, 'register'])->name('register');
Route::post('/login', [AutenticacionController::class, 'login'])->name('login');
Route::post('/logout', [AutenticacionController::class, 'logout'])->name('logout');

Route::resource('regionales', RegionalesController::class);

Route::resource('aprendices', AprendicesController::class);

Route::resource('programasdeformacion', ProgramasdeformacionController::class);

Route::resource('eps', EpsController::class);

Route::resource('tiposdedocumentos', TiposdocumentosController::class);

Route::resource('rolesadministrativos', RolesadministrativosController::class);

Route::resource('fichasdecaracterizacion', FichasdecaracterizacionController::class);

Route::resource('enteconformadores', EnteconformadoresController::class);

Route::resource('instructores', InstructoresController::class);


Route::resource('alternativaetapa', AlternativaEtapaProducticaController::class);

Route::resource('centrosformacion', CentrosdeformacionController::class);

Route::resource('subtipoalternativa', SubTiposAlternativaController::class);

Route::resource('bitacorasseguimientos', BitacorasSeguimientosController::class);


?>