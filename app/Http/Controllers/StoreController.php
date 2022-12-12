<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Product;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::Paginate(4);
        return view('stores.index',compact('stores'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::All();
        return view('stores.new',compact('products'));
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
        
        $stores = new Store;
        $stores->name = $request->name;
        $stores->address = $request->address;
        $stores->contact = $request->contact;
        $stores->save();
        return redirect('/stores');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        $store->load("products");
        //dd($product);
        return view('stores.show',compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $stores = Store::findOrFail($id);
        $editstore = Store::All();
        return view('stores.update',compact('stores','editstore'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $stores = Store::findOrFail($id);
        $stores->name = $request->name;
        $stores->address = $request->address;
        $stores->contact = $request->contact;
        $stores->save();
        return redirect('/stores');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Store  $store
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stores = Store::findOrFail($id);
        $stores->delete();
        return redirect('/stores');
    }

    //RELACION N A N

    public function editProducts(Store $store) 
    {
        $arrayProducts = $store->products->pluck('id'); 
        
        $products = Product::whereNotIn('id',$arrayProducts)->get();
       
        
        return view('stores.showStores',compact('store','products'));
    }

    public function attachProducts(Request $request, Store $store) 
    {
        
        /*
        $request->validate([
            'stock' => 'nullable',                       
        ]);
        */
        
        $store->products()->attach($request->products);
        
        return redirect()->route('stores.editproducts',$store->id);

    }


    public function detachProducts(Request $request, Store $store) 
    {
        /*
        $request->validate([
            'moves' => 'exists:moves,id',                       
        ]);
        */

        if ($request->has('products'))
            $store->products()->detach($request->products);
        
        return redirect()->route('stores.editproducts',$store->id);

    }
}
