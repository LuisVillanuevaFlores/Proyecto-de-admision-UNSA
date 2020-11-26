<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('roles','RolesController');
Route::apiResource('procesos','ProcesosController');
Route::apiResource('aulas',"AulasController");
Route::apiResource('pabellones',"PabellonesController");
Route::apiResource('participantes',"ParticipantesController");
Route::apiResource('procesoParticipantes',"ProcesoParticipantesController");
Route::fallback(function(){
    return response()->json([
        'message' => 'Pagina no encontrada'], 404);
});