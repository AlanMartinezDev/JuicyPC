<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ProductController;

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
    return view('index');
});

Route::get('/cuenta', function () {
    return view('cuenta');
});

Route::get('/registro', function () {
    return view('registro');
});

Route::get('/carrito', function () {
    return view('carrito');
});

Route::get('/centro-de-ayuda', function () {
    return view('ayuda');
});

Route::get('/admin', function () {
    return view('admin');
});

Route::get('/',[ProductController::class,'index']);
Route::get('/new',[ProductController::class,'create']);
Route::post('/save',[ProductController::class,'store']);
Route::get('/productos/update/{id}',[ProductController::class,'edit']);
Route::post('/productos/update/{id}',[ProductController::class,'update']);
Route::get('/productos/delete/{id}',[ProductController::class,'destroy']);

//login
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','is_admin']], function(){

    Route::get('/cuenta', function(){
        $user = auth()->user();
        return view('cuenta',compact('user'));
    });

    Route::get('/secreta2', function(){
        return "Estas autentificado2";
    });

});

Route::group(['middleware'=>['auth','role:normal']], function(){

    Route::get('/accesonormal', function(){
        echo "Estas autentificado i tienes rol normal";
    });

});

Route::group(['middleware'=>['auth','role:admin']], function(){

    Route::get('/accesoadmin', function(){
        echo "Estas autentificado i tienes rol admin";
    });

});

Route::post('/cuenta/{id}',[UserController::class,'update']);
Route::post('/cuenta2/{id}',[UserController::class,'updateBalance']);
Route::get('/eliminarCuenta/{id}',[UserController::class, 'destroy']);
