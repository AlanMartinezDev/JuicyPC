<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cat;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Cat::Paginate(4);

        if (!isset(auth()->user()->id) || isset(auth()->user()->id) && auth()->user()->role == "normal") {
            return view('categorias.index',compact('cats'));
        }else {
            return view('categorias.indexAdmin',compact('cats'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::All();
        return view('categorias.new',compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required','string', 'max:255','min:3'],
            'image' => ['nullable','string', 'max:255','min:3']
            ]);

        $cat = new Cat;
        $cat->name = $request->name;
        if($request->image != '') {
            $cat->image = $request->image;
        }
        $cat->user_id = auth()->user()->id;
        $cat->save();
        return redirect('/categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Cat $cats)
    {
        $cats->load("products");
        //dd($cats);
        return view('categorias.show',compact('cats'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cats = Cat::findOrFail($id);
        $products = Product::All();
        return view('categorias.update',compact('products','cats'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cats = Cat::findOrFail($id);
        $cats->name = $request->name;
        $cats->image = $request->image;
        $cats->save();
        return redirect('/categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cats = Cat::findOrFail($id);
        $cats->delete();
        return back();
    }
}
