<?php

use App\Http\Controllers\AlternativaEtapaProducticaController;
use App\Http\Controllers\BitacorasSeguimientosController;
use App\Http\Controllers\CentrosdeformacionController;
use App\Http\Controllers\AprendicesController;
use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\EpsController;
use App\Http\Controllers\Admin\AdminDashboard;
use App\Http\Controllers\Instructores\InstructoresDashboard;
use App\Http\Controllers\Aprendices\AprendicesDashboard;
use App\Http\Controllers\FichasdecaracterizacionController;
use App\Http\Controllers\ProgramasdeformacionController;
use App\Http\Controllers\RegionalesController;
use App\Http\Controllers\RolesadministrativosController;
use App\Http\Controllers\TiposdocumentosController;
use App\Http\Controllers\EnteconformadoresController;
use App\Http\Controllers\SubTiposAlternativaController;
use App\Http\Controllers\Admin\AsignarRolesController;
use App\Http\Controllers\Admin\CrearUsuarioController;
use App\Http\Controllers\CompletarDatosController;
use App\Http\Controllers\CompletarDatosInstructores; // ✅ IMPORTANTE
use Illuminate\Support\Facades\Route;

/****************************************************
 * LOGIN
 ****************************************************/
Route::get('/', [AutenticacionController::class, 'showLogin'])->name('login');

/****************************************************
 * AUTH
 ****************************************************/
Route::get('/register', [AutenticacionController::class, 'showRegister'])->name('showRegister');
Route::get('/login', [AutenticacionController::class, 'showLogin'])->name('showLogin');

Route::post('/register', [AutenticacionController::class, 'register'])->name('register');
Route::post('/login', [AutenticacionController::class, 'login'])->name('login');
Route::post('/logout', [AutenticacionController::class, 'logout'])->name('logout');

/****************************************************
 * ADMIN
 ****************************************************/
Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        Route::get('/dashboard', [AdminDashboard::class, 'index'])->name('dashboard');
        Route::get('/asignaroles', [AsignarRolesController::class, 'index'])->name('asignaroles');

        Route::resource('/usuarios', CrearUsuarioController::class)->names('usuarios');
        Route::resource('regionales', RegionalesController::class);
        Route::resource('aprendices', AprendicesController::class);
        Route::resource('programasdeformacion', ProgramasdeformacionController::class);
        Route::resource('eps', EpsController::class);
        Route::resource('tiposdedocumentos', TiposdocumentosController::class);
        Route::resource('rolesadministrativos', RolesadministrativosController::class);
        Route::resource('fichasdecaracterizacion', FichasdecaracterizacionController::class);
        Route::resource('enteconformadores', EnteconformadoresController::class);
        Route::resource('alternativaetapa', AlternativaEtapaProducticaController::class);
        Route::resource('centrosformacion', CentrosdeformacionController::class);
        Route::resource('subtipoalternativa', SubTiposAlternativaController::class);
        Route::resource('bitacorasseguimientos', BitacorasSeguimientosController::class);
    });

/****************************************************
 * INSTRUCTOR
 ****************************************************/
Route::middleware(['auth', 'role:instructor', 'perfil.completo'])
    ->prefix('instructor')
    ->name('instructor.')
    ->group(function () {

        Route::get('/dashboard', [InstructoresDashboard::class, 'index'])
            ->name('dashboard');
    });

/****************************************************
 * APRENDIZ
 ****************************************************/
Route::middleware(['auth', 'role:aprendiz', 'perfil.completo'])
    ->prefix('aprendiz')
    ->name('aprendiz.')
    ->group(function () {

        Route::get('/dashboard', [AprendicesDashboard::class, 'index'])
            ->name('dashboard');
    });

/****************************************************
 * COMPLETAR PERFIL (SIN perfil.completo)
 ****************************************************/
Route::middleware(['auth'])->group(function () {

    // ✅ APRENDIZ
    Route::get('/aprendiz/completar-perfil', [CompletarDatosController::class, 'index'])
        ->name('aprendiz.completar-perfil');

    Route::post('/aprendiz/completar-perfil', [CompletarDatosController::class, 'store'])
        ->name('aprendiz.completar-perfil.store');

    // ✅ INSTRUCTOR
    Route::get('/instructor/completar-perfil', [CompletarDatosInstructores::class, 'index'])
        ->name('instructor.completar-perfil');

    Route::post('/instructor/completar-perfil', [CompletarDatosInstructores::class, 'store'])
        ->name('instructor.completar-perfil.store');
});