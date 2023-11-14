<?php

use App\Http\Controllers\DocDocumentoController;
use App\Http\Controllers\ProProcesoController;
use App\Http\Controllers\TipTipoDocumentoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware(['auth:sanctum'])->group(function () {
   
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
});

Route::apiResource("documentos", DocDocumentoController::class);
Route::apiResource("tipos", TipTipoDocumentoController::class);
Route::apiResource("procesos", ProProcesoController::class);