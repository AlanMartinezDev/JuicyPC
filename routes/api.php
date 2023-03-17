<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ProductController;
use App\Http\Controllers\api\CategoryController;
use App\Http\Controllers\api\UserController;
use App\Http\Controllers\api\StoreController;
use App\Http\Controllers\api\RegisterController;
use App\Http\Controllers\Auth\LoginController;

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
                                    //group en vez del get para que pille todo
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register', [RegisterController::class, 'register']);

Route::post('login', [RegisterController::class, 'login']);

Route::middleware('auth:sanctum')->group( function () {
    
    
});

Route::get('/login', function () {
    return "Has de validar-te com a usuari!";
})->name("login");

Route::resource('productos', ProductController::class);

Route::resource('categorias', CategoryController::class);

Route::resource('usuarios', UserController::class);

Route::resource('stores', StoreController::class);
