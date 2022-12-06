<?php

use App\Http\Controllers\TestController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::prefix('/testing')->group(function () use ($router) {
    $router->get('/getTest', [TestController::class, 'listarLibros']);
    $router->post('/postTest', [TestController::class, 'guardarLibros']);
    $router->get('/filtrar', [TestController::class, 'filtrarLibros']);
    $router->post('/actualizar', [TestController::class, 'actualizarLibro']);
    $router->post('/actualizarDos', [TestController::class, 'actualizarLibroDos']);

});