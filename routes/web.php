<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ComponentController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\StoreController;
use App\Http\Controllers\ShoppingCartController;
use App\Http\Controllers\OrderController;

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



//HABILITAMOS LAS RUTAS
Auth::routes();

//RUTAS GET | PÁGINA PRINCIPAL

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//RUTAS GET | VISUALIZACIÓN DE PRODUCTOS | USUARIO : NORMAL

Route::get('/productos',[App\Http\Controllers\ProductController::class, 'index'])->name('productos.index');
Route::get('/productos/{producto}/',[App\Http\Controllers\ProductController::class, 'show'])->name('productos.show');

//Rutas de Categorias
Route::get('/categorias',[App\Http\Controllers\CategoryController::class, 'index'])->name('categorias.index');
Route::get('/categorias/show/{cats}',[App\Http\Controllers\CategoryController::class, 'show'])->name('categorias.show');

Route::get('/orders/{order}/orders', [App\Http\Controllers\OrderController::class, 'editOrders'])->name('orders.editorders');
Route::post('/orders/save',[App\Http\Controllers\ShoppingCartController::class,'store'])->name('orders.store');

Route::get('/cuenta', function () {
    $user = auth()->user();
    return view('cuenta',compact('user'));
});

Route::get('/carrito', function () {
    $user = auth()->user();
    return view('carrito',compact('user'));
});

//Rutas carrito
Route::post('/carrito/add',[App\Http\Controllers\ShoppingCartController::class,'add'])->name('carrito.add');
Route::post('/carrito/clear',[App\Http\Controllers\ShoppingCartController::class,'clear'])->name('carrito.clear');
Route::post('/carrito/removeitem',[App\Http\Controllers\ShoppingCartController::class,'removeitem'])->name('carrito.removeitem');
Route::post('/carrito/additem',[App\Http\Controllers\ShoppingCartController::class,'additem'])->name('carrito.additem');
Route::post('/carrito/subtractitem',[App\Http\Controllers\ShoppingCartController::class,'subtractitem'])->name('carrito.subtractitem');
Route::post('/carrito/{id}',[App\Http\Controllers\ShoppingCartController::class,'userBalance'])->name('carrito.balance');

//Rutas centro de ayuda
Route::get('/centro-de-ayuda', function () {
    return view('ayuda');
});


//Rutas store


Route::group(['middleware'=>['auth']], function(){

    Route::get('/cuenta', function () {
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

        //RUTAS GET | CRUD PRODUCTO + RELACIÓN N A N DE PRODUCTOS CON CATEGORÍAS | USUARIO : ADMIN

        //Route::get('/productos',[App\Http\Controllers\ProductController::class, 'index'])->name('productos.indexAdmin');
        Route::get('/productos/create',[App\Http\Controllers\ProductController::class,'create'])->name('productos.create');
        Route::get('/productos/delete/{id}',[App\Http\Controllers\ProductController::class,'destroy'])->name('productos.destroy');
        Route::get('/productos/{product}/cats', [App\Http\Controllers\ProductController::class, 'editCats'])->name('products.editcats');
        Route::get('/productos/update/{id}',[App\Http\Controllers\ProductController::class,'edit'])->name('productos.index');

        //RUTAS POST | CRUD PRODUCTO + RELACIÓN N A N DE PRODUCTOS CON CATEGORÍAS | USUARIO : ADMIN

        Route::post('/productos/save',[App\Http\Controllers\ProductController::class,'store'])->name('productos.store');
        Route::post('/productos/update/{id}',[App\Http\Controllers\ProductController::class,'update'])->name('productos.update');
        Route::post('/productos/{product}/assigncats', [App\Http\Controllers\ProductController::class, 'attachCats'])->name('products.assigncats');
        Route::post('/productos/{product}/detachcats', [App\Http\Controllers\ProductController::class, 'detachCats'])->name('products.detachcats');

        //

        Route::get('/categorias/create',[App\Http\Controllers\CategoryController::class,'create'])->name('cat.create');
        Route::post('/categorias/save',[App\Http\Controllers\CategoryController::class,'store'])->name('cat.store');
        Route::get('/categorias/update/{id}',[App\Http\Controllers\CategoryController::class,'edit'])->name('cat.index');
        Route::post('/categorias/update/{id}',[App\Http\Controllers\CategoryController::class,'update'])->name('cat.update');
        Route::get('/categorias/delete/{id}',[App\Http\Controllers\CategoryController::class,'destroy'])->name('cat.destroy');

        Route::get('/stores/{store}/stores', [App\Http\Controllers\StoreController::class, 'editProducts'])->name('stores.editproducts');
        Route::post('/stores/{store}/assignstores', [App\Http\Controllers\StoreController::class, 'attachProducts'])->name('stores.assignproducts');
        Route::post('/stores/{store}/detachstores', [App\Http\Controllers\StoreController::class, 'detachProducts'])->name('stores.detachproducts');

        //Añadir/Editar/Eliminar store
        Route::get('/stores/create',[App\Http\Controllers\StoreController::class,'create'])->name('stores.create');
        Route::post('/stores/save',[App\Http\Controllers\StoreController::class,'store'])->name('stores.store');
        Route::get('/stores/update/{id}',[App\Http\Controllers\StoreController::class,'edit'])->name('stores.index');
        Route::post('/stores/update/{id}',[App\Http\Controllers\StoreController::class,'update'])->name('stores.update');
        Route::get('/stores/delete/{id}',[App\Http\Controllers\StoreController::class,'destroy'])->name('stores.destroy');

        Route::get('/stores',[App\Http\Controllers\StoreController::class, 'index'])->name('stores.index');
        Route::get('/stores/show/{store}',[App\Http\Controllers\StoreController::class, 'show'])->name('stores.show');
    });
});