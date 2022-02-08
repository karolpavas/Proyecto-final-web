<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PacienteController;
use App\Http\Controllers\ConsultaController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\FacturaController;
use App\Http\Controllers\HistoriaCLinicaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RemisionClinicaController;
use App\Http\Controllers\ReportesController;
use Illuminate\Support\Facades\Auth;

/*

|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('paciente', PacienteController::class)->middleware('auth');
Route::resource('consulta', ConsultaController::class)->middleware('auth');
Route::resource('empleado', EmpleadoController::class)->middleware('auth');
Route::resource('factura', FacturaController::class)->middleware('auth');
Route::resource('historiaClinica', HistoriaCLinicaController::class)->middleware('auth');
Route::resource('remisionClinica', RemisionClinicaController::class)->middleware('auth');
Route::resource('reporte', ReportesController::class)->middleware('auth');

Route::get('factura/{codConsulta}/facturar', [FacturaController::class,'facturar']);
Route::get('historiaClinica/{cedulaPaciente}/show', [HistoriaCLinicaController::class,'historiaClinica']);

Route::get('reportes/consultas', [ReportesController::class,'consultas']);
Route::get('reportes/general', [ReportesController::class,'general']);


Auth::routes();


Route::group(['middleware' => 'auth'], function(){
    Route::get('/',[HomeController::class, 'index'])->name('home');
});