<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cat;
use Illuminate\Http\Request;

class ComponentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Product $product)
    {
        $components = Product::All();
        $product->load("categories");
        return view('categorias.componentes.index',compact('components', 'product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias.componentes.new');
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

        $components = new Product;
        $components->brand = $request->brand;
        $components->name = $request->name;
        $components->description = $request->description;
        $components->price = $request->price;
        $components->image = $request->image;
        $components->save();
        return redirect('/componentes');
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
        return view('categorias.componentes.update',compact('components'));
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
        return redirect('/componentes');
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
        return redirect('/componentes');
    }
}
