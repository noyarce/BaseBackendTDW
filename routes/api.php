<?php

use App\Http\Controllers\TestController;
use App\Http\Controllers\AuthController;

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

Route::group(['prefix' => 'auth'], function () use ($router) {
    $router->post('login', [AuthController::class, 'login'])->name('login');
    $router->post('signup', [AuthController::class, 'signUp']);
    $router->get('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
});

Route::prefix('/testing')->group(function () use ($router) {
    $router->get('/getTest', [TestController::class, 'listarLibros'])->middleware('auth:sanctum');
    $router->post('/postTest', [TestController::class, 'guardarLibros']);
    $router->get('/filtrar', [TestController::class, 'filtrarLibros']);
    $router->post('/actualizar', [TestController::class, 'actualizarLibro']);
    $router->post('/job', [TestController::class, 'ejemploJob']);
});
