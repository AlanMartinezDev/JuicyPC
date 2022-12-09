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
    return view('welcome');
});

//login
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/productos',[App\Http\Controllers\ProductController::class, 'index'])->name('productos.index');
Route::get('/productos/show/{product}',[App\Http\Controllers\ProductController::class, 'show'])->name('productos.show');
Route::get('/categorias',[App\Http\Controllers\CategoryController::class, 'index'])->name('categorias.index');
Route::get('/categorias/show/{cats}',[App\Http\Controllers\CategoryController::class, 'show'])->name('categorias.show');

Route::get('/cuenta', function () {
    return view('cuenta');
});

Route::get('/carrito', function () {
    return view('carrito');
});

Route::get('/centro-de-ayuda', function () {
    return view('ayuda');
});

Route::group(['middleware'=>['auth']], function(){

    Route::get('/cuenta', function(){
        $user = auth()->user();
        return view('cuenta',compact('user'));
    });

    
    Route::post('/cuenta/{id}',[UserController::class,'update']);
    Route::post('/cuenta2/{id}',[UserController::class,'updateBalance']);
    Route::get('/eliminarCuenta/{id}',[UserController::class, 'destroy']);

    Route::group(['middleware'=>['auth','role:admin']], function(){

        Route::get('/admin', function () {
            return view('admin');
        });

        Route::get('/productos/create',[App\Http\Controllers\ProductController::class,'create'])->name('productos.create');
        Route::post('/productos/save',[App\Http\Controllers\ProductController::class,'store'])->name('productos.store');
        Route::get('/productos/update/{id}',[App\Http\Controllers\ProductController::class,'edit'])->name('productos.index');
        Route::post('/productos/update/{id}',[App\Http\Controllers\ProductController::class,'update'])->name('productos.update');
        Route::get('/productos/delete/{id}',[App\Http\Controllers\ProductController::class,'destroy'])->name('productos.destroy');
        
        Route::get('/productos/{product}/cats', [App\Http\Controllers\ProductController::class, 'editCats'])->name('products.editcats');

        Route::post('/productos/{product}/assigncats', [App\Http\Controllers\ProductController::class, 'attachCats'])->name('products.assigncats');

        Route::post('/productos/{product}/detachcats', [App\Http\Controllers\ProductController::class, 'detachCats'])->name('products.detachcats');

    });
});