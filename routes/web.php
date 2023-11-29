<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CheckListController;
use App\Http\Controllers\HistorialLocalController;
use App\Http\Controllers\PruebasController;
use App\Http\Controllers\VehiculoController;
use App\Http\Controllers\SolicitudController;
use App\Http\Controllers\TareaController;
use App\Http\Controllers\RutaController;

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

//Route::get('/', function () {
//    return view('login');
//});

//Route::view('planificador','planificador')->middleware('auth');

Route::get('prueba',[PruebasController::class, 'fecha']);
//Login

Route::view('/','login');
Route::view('login','login')->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']);

//Conductor

//Route::view('conductor','Conductor/conductor')->name('conductor')->middleware('auth');
//Route::get('conductor',[VehiculoController::class, 'completaRuta'])->name('conductor')->middleware('auth');
Route::get('conductor',[RutaController::class, 'estadoRuta'])->name('conductor')->middleware('auth');
Route::get('conductor/checklist',[CheckListController::class,'create'])->name('check_list.create')->middleware('auth');
Route::view('check_list_vehiculo','Conductor/check_list_vehiculo')->middleware('auth');
Route::post('conductor/check_list/create',[CheckListController::class, 'store'])->name('check_list.store')->middleware('auth');
Route::get('conductor/ruta/estado',[RutaController::class, 'estadoRuta'])->name('ruta.estadoRuta')->middleware('auth');
Route::post('conductor/ruta',[RutaController::class, 'store'])->name('ruta.store')->middleware('auth');
Route::view('conductor/info/ruta','Conductor/conductorRuta')->middleware('auth');
Route::view('conductor/info/rutaIniciada','Conductor/conductorRutaIniciada')->middleware('auth');
Route::view('conductor/info/rutaFinalizada','Conductor/conductorRutaLista')->middleware('auth');
Route::get('conductor/ruta/finalizar',[RutaController::class, 'finalizarRuta'])->name('ruta.finalizarRuta')->middleware('auth');

//Planificador

Route::get('planificador',[SolicitudController::class,'listarSolicitudes'])->name('planificador')->middleware('auth');
//Route::get('planificadorJSON',[SolicitudController::class,'listarSolicitudesJSON'])->middleware('auth');
Route::get('planificador/asignacion/{item}',[TareaController::class, 'create'])->name('tarea.create')->middleware('auth');
Route::post('planificador/solicitud/derivar',[SolicitudController::class, 'derivar'])->name('solicitud.derivar')->middleware('auth');
Route::post('planificador/asignacion/create',[TareaController::class, 'store'])->name('tarea.store')->middleware('auth');


//Vehiculo

Route::get('vehiculo',[VehiculoController::class,'listarVehiculos'])->name('vehiculo')->middleware('auth');
Route::get('vehiculo/historial/{item}',[HistorialLocalController::class,'listarHistorialLocal'])->name('vehiculo.historial_local')->middleware('auth');

//Mecanico

//Route::view('mecanico','Mecanico/mecanico')->middleware('auth');
Route::get('mecanico',[TareaController::class,'listarTareas'])->name('mecanico')->middleware('auth');
Route::post('mecanico/tarea/iniciar',[TareaController::class, 'iniciarProceso'])->name('mecanico.iniciar')->middleware('auth');
Route::post('mecanico/tarea/finalizar',[TareaController::class, 'finalizarProceso'])->name('mecanico.finalizar')->middleware('auth');
Route::post('mecanico/tarea/desabilitar',[TareaController::class, 'desabilitarVehiculo'])->name('mecanico.desabilitar')->middleware('auth');

//Supervisor

//Route::view('supervisor','Supervisor/supervisor')->middleware('auth');
//Route::get('supervisor/inicio/{id_trabajador}',[SolicitudController::class, 'indexSupervisor'])->name('solicitud.index')->middleware('auth');
Route::get('supervisor',[CheckListController::class,'listarCheckList'])->name('supervisor')->middleware('auth');
//Route::view('supervisor/solicitud','Supervisor/SolicitudCreate')->middleware('auth');
Route::get('supervisor/solicitud/{item}',[SolicitudController::class, 'create'])->name('solicitud.create')->middleware('auth');
Route::get('supervisor/solicitud/aprobar/{item}',[CheckListController::class, 'aprobarCheckList'])->name('checklist.aprobar')->middleware('auth');
//Route::get('supervisor/solicitud/rechazar/{item}',[CheckListController::class, 'rechazarCheckList'])->name('checklist.rechazar')->middleware('auth');
Route::post('supervisor/solicitud/create',[SolicitudController::class, 'store'])->name('solicitud.store')->middleware('auth');
Route::get('supervisor/solictud/visualizar',[CheckListController::class,'VerCheckList'])->name('verCheckList')->middleware('auth');
