<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoughController;
use App\Http\Controllers\SauceController;
use App\Http\Controllers\FlavorController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\UsersController;
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

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
     return $request->user();
 });*/

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//Route::get('/flavor', [FlavorController::class, 'getFlavor']);
//Route::post('/flavor', [FlavorController::class, 'postFlavor']);
//Route::delete('/flavor', [FlavorController::class, 'deleteFlavor']);


Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/logout', [AuthController::class, 'logout']);

    /*
    * Rotas sabores
    */
    Route::get('/flavor', [FlavorController::class, 'index']);
    Route::get('/flavor/{id}', [FlavorController::class, 'show']);
    Route::post('/flavor', [FlavorController::class, 'store']);
    Route::delete('/flavor/{id}', [FlavorController::class, 'destroy']);
    Route::put('/flavor/{id}', [FlavorController::class, 'update']);

    /*
    * Rotas tamanho
    */
    Route::get('/size', [SizeController::class, 'index']);
    Route::get('/size/{id}', [SizeController::class, 'show']);
    Route::post('/size', [SizeController::class, 'store']);
    Route::delete('/size/{id}', [SizeController::class, 'destroy']);
    Route::put('/size/{id}', [SizeController::class, 'update']);

    /*
    * Rotas massas
    */
    //Route::apiResource('dough', DoughController::class); /*método para simplificar as rotas
    Route::post('/dough', [DoughController::class, 'store']);
    Route::put('/dough/{id}', [DoughController::class, 'update']);
    Route::get('/dough', [DoughController::class, 'index']);
    Route::get('/dough/{id}', [DoughController::class, 'show']);
    Route::delete('/dough/{id}', [DoughController::class, 'destroy']);

    /*
    * Rotas molhos
    */
    //Route::apiResource('sauce', SauceController::class); /*método para simplificar as rotas
    Route::post('/sauce', [SauceController::class, 'store']);
    Route::put('/sauce/{id}', [SauceController::class, 'update']);
    Route::get('/sauce', [SauceController::class, 'index']);
    Route::get('/sauce/{id}', [SauceController::class, 'show']);
    Route::delete('/sauce/{id}', [SauceController::class, 'destroy']);
});
