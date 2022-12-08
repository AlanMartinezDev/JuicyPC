<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComponentController;

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

Route::get('/componentes',[ComponentController::class,'index']);
Route::get('/componentes/new',[ComponentController::class,'create']);
Route::post('/componentes/save',[ComponentController::class,'store']);
Route::get('/componentes/update/{id}',[ComponentController::class,'edit']);
Route::post('/componentes/update/{id}',[ComponentController::class,'update']);
Route::get('/componentes/delete/{id}',[ComponentController::class,'destroy']);

Route::get('/perifericos',[ProductController::class,'index']);

Route::get('/ordenadores',[ProductController::class,'index']);

Route::get('/portatiles',[ProductController::class,'index']);

Route::get('/moviles',[ProductController::class,'index']);

Route::get('/tablets',[ProductController::class,'index']);

/*
Route::get('/ordenadores', function () {
    return view('categorias.ordenadores');
});

Route::get('/portatiles', function () {
    return view('categorias.portatiles');
});

Route::get('/moviles', function () {
    return view('categorias.moviles');
});


Route::get('/componentes', function () {
    return view('categorias.componentes');
});

Route::get('/perifericos', function () {
    return view('categorias.perifericos');
});

Route::get('/tablets', function () {
    return view('categorias.tablets');
});
*/
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
