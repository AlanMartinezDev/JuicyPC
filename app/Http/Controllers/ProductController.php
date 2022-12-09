<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cat;
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
        return view('productos.new');
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
        /*
        $components = new Product;
        $components->brand = $request->brand;
        $components->name = $request->name;
        $components->description = $request->description;
        $components->price = $request->price;
        $components->image = $request->image;
        $components->save();
        */

        $request->validate([
            'brand' => 'required | min:3',
            'name' => 'required | min:3', 
            'description' => 'required | min:3',
            'price' => 'required | min:3',
            'image' => 'required | min:3',          
        ]);

        Product::create($request->all());
     
        return redirect()->route('productos.index')->with('success','Product added successfuly.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $components = Product::findOrFail($id);
        return view('productos.update',compact('components'));
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
        $components = Product::findOrFail($id);
        $components->brand = $request->brand;
        $components->name = $request->name;
        $components->description = $request->description;
        $components->price = $request->price;
        $components->image = $request->image;
        $components->save();
        return redirect('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $components = Product::findOrFail($id);
        $components->delete();
        return redirect('productos.index');
    }
}
