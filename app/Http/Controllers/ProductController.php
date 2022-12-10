<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cat;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$categoria = Cat::All();
        $products = Product::All();
        return view('productos.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cats = Cat::All();
        return view('productos.new',compact('cats'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate(
            [ 'realname' => 'required | max:75',
              'heroname' => 'required | max:25 | unique:superheroes,heroname,'.$id,
              'gender' => 'required | in:male,female',
              'planet_id' => 'required | exists:planets,id' ]
        );*/
        
        $products = new Product;
        $products->brand = $request->brand;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->image = $request->image;
        $products->save();
        return redirect('/productos');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product->load("cats");
        //dd($product);
        return view('productos.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $products = Product::findOrFail($id);
        $cats = Cat::All();
        return view('productos.update',compact('products','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $products = Product::findOrFail($id);
        $products->brand = $request->brand;
        $products->name = $request->name;
        $products->description = $request->description;
        $products->price = $request->price;
        $products->image = $request->image;
        $products->save();
        return redirect('/productos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */

     //CATEGORIES

    public function destroy($id)
    {
        $products = Product::findOrFail($id);
        $products->delete();
        return redirect('/productos');
    }

    public function editCats(Product $product) 
    {
        
        // Transformem la col·lecció de superpoders en un array amb els id's
        
        $arrayId = $product->cats->pluck('id'); // exemple: [1,3,5]
        
        $cats = Cat::whereNotIn('id',$arrayId)->get();
        $cats2 = Cat::All();
       
        
        return view('productos.showCats',compact('product','cats','cats2'));
    }

    public function attachCats(Request $request, Product $product) 
    {
        
        /*
        $request->validate([
            'powers' => 'exists:moves,id',                       
        ]);
        */

       $product->cats()->attach($request->cats);
        
        return redirect()->route('products.editcats',$product->id);

    }


    public function detachCats(Request $request, Product $product) 
    {
        /*
        $request->validate([
            'moves' => 'exists:moves,id',                       
        ]);
        */

        if ($request->has('cats'))
            $product->cats()->detach($request->cats);
        
        return redirect()->route('products.editcats',$product->id);

    }

}
