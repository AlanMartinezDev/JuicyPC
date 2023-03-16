<?php

//DEFINIMOS EL ESPACIO DE TRABAJO DEL CONTROLADOR
namespace App\Http\Controllers;

//IMPORTAMOS LA FUNCIÓN REQUEST PARA INSERTAR EN LA BASE DE DATOS
use Illuminate\Http\Request;

//IMPORTAMOS LOS MODELOS A UTILIZAR
use App\Models\Product;
use App\Models\Cat;
use App\Models\Store;
use App\Models\User;

class ProductController extends Controller
{
     //APARTADO IMPLEMENTACIÓN CRUD

    public function index()
    {
        //ACCEDEMOS AL MODELO PRODCUTO Y DEVOLVEMOS A LA VISTA CON COMPACT LA VARIABLE QUE CONTIENE LA INFORMACIÓN CON PAGINADO

        $products = Product::Paginate(8);

        //REDIRECCIÓN A LA VISTA /productos

        // vista admin
        //return view('productos.indexAdmin',compact('products'));

        // vista usuario normal
        return view('productos.index',compact('products'));
    }

    public function create()
    {
        //ACCEDEMOS AL MODELO CATEGORÍA Y DEVOLVEMOS A LA VISTA CON COMPACT LA VARIABLE QUE CONTIENE LA INFORMACIÓN

        $cats = Cat::All();

        //REDIRECCIÓN A LA VISTA /productos/new

        return view('productos.new',compact('cats'));
    }

    public function store(Request $request)
    {
        //VALIDAMOS LA INFORMACIÓN A PROCESAR A LA HORA DE ALMACENAR UN NUEVO PRODUCTO

        $request->validate([
            'brand' => ['required','string', 'max:255','min:3'],
            'name' => ['required','string', 'max:255','min:3'],
            'description' => ['required','string', 'max:255','min:3'],
            'price' => ['required','numeric'],
            'image' => ['nullable','string', 'max:255','min:3']
            ]);
        
        //ACCEDEMOS AL MODELO PRODUCTO Y ALMACENAMOS DENTRO DE LA BASE DE DATOS LA INFORMACIÓN RECOGIDA

        $products = new Product;
        $products->brand = $request->brand;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        if($request->image != '') {
            $products->image = $request->image;
        }
        $products->user_id = auth()->user()->id;
        $products->save();

        //REDIRECCIÓN A LA VISTA /productos

        return redirect('/productos/'.$products->id.'/cats');
    }

    public function show(Product $product)
    {
        //CARGAMOS EL ARRAY CONTENEDOR DE TODAS LAS CATEGORÍAS Y LO GUARDAMOS EN UNA VARIABLE QUE DEVOLVEMOS A LA VISTA CON COMPACT

        $product->load("cats");

        //REDIRECCIÓN A LA VISTA /productos/show

        return view('productos.show',compact('product'));
    }

    public function edit($id)
    {
        //ACCEDEMOS AL MODELO PRODUCTO Y CATEGORÍA Y DEVOLVEMOS A LA VISTA LAS VARIABLES CON COMPACT

        $products = Product::findOrFail($id);
        $cats = Cat::All();

        //REDIRECCIÓN A LA VISTA /productos/update

        return view('productos.update',compact('products','cats'));
    }

    public function update(Request $request, $id)
    {
        //VALIDAMOS LA INFORMACIÓN A PROCESAR A LA HORA DE ACTUALIZAR DATOS DE UN PRODUCTO

        $request->validate([
            'brand' => ['required','string', 'max:255','min:3'],
            'name' => ['required','string', 'max:255','min:3'],
            'description' => ['required','string', 'max:255','min:3'],
            'price' => ['required','numeric'],
            'image' => ['nullable','string', 'max:255','min:3']
            ]);
        
        //ACCEDEMOS AL MODELO PRODUCTO Y ALMACENAMOS DENTRO DE LA BASE DE DATOS LA INFORMACIÓN RECOGIDA

        $products = Product::findOrFail($id);
        $products->brand = $request->brand;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->image = $request->image;
        $products->save();

        //REDIRECCIÓN A LA VISTA /productos

        return redirect('/productos');
    }

    public function destroy($id)
    {
        //ACCEDEMOS AL MODELO PRODUCTO

        $products = Product::findOrFail($id);

        //BORRAMOS EL PRODUCTO DE LA BASE DE DATOS

        $products->delete();

        //REDIRECCIÓN A LA VISTA /productos

        return back();
    }

    //APARTADO RELACIÓN N A N DE PRODUCTOS CON CATEGORÍAS

    public function editCats(Product $product) 
    {   
        //CREAMOS UNA VARIABLE Y ACCEDEMOS A EL ARRAY QUE CONTIENE LAS CATEGORÍAS Y GUARDAMOS EL ID

        $arrayCats = $product->cats->pluck('id');

        //CREAMOS UNA VARIABLE DONDE GUARDAR EL OBJETO CATEGORÍA Y COMPROBAMOS QUE NO ESTA REPETIDO Y ENTONCES ACCEDEMOS A ÉL

        $categorias = Cat::whereNotIn('id',$arrayCats)->get();
       
        //REDIRECCIÓN A LA VISTA /productos/showCats Y HACEMOS COMPACT DE NUESTRAS VARIABLES PARA PODER ACCEDER A ELLAS EN LA VISTA
        
        return view('productos.showCats',compact('product','categorias'));
    }

    public function attachCats(Request $request, Product $product) 
    {
        //CREAMOS UNA VARIABLE CONTENEDORA DE LAS CATEGORÍAS Y ASIGNAMOS ESA CATEGORÍA A UN PRODUCTO CON ATTACH

        $product->cats()->attach($request->cats);
        
        //REDIRECCIÓN A LA VISTA /productos/{product}/cats JUNTO CON EL IDENTIFICADOR DEL PRODUCTO A ASIGNAR

        return redirect()->route('products.editcats',$product->id);
    }

    public function detachCats(Request $request, Product $product) 
    {
        //COMPROBAMOS QUE NUESTRA REQUEST CONTENGA UNA CATEGORÍA Y LA DESVINCULAMOS DEL PRODUCTO

        if ($request->has('cats'))
            $product->cats()->detach($request->cats);
        
        //REDIRECCIÓN A LA VISTA /productos/{product}/cats JUNTO CON EL IDENTIFICADOR DEL PRODUCTO A DESVINCULAR

        return redirect()->route('products.editcats',$product->id);
    }
}
