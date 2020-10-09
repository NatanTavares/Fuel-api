<?php

use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\CarroController;
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

Route::post('usuarios/login', [UsuarioController::class, 'login']);

Route::resource('usuarios', UsuarioController::class);
Route::resource('carros', CarroController::class);
