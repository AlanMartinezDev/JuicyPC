<?php

namespace App\Http\Controllers;

use App\Models\ShoppingCart;
use App\Models\Product;
use Illuminate\Http\Request;
use Cart;
use App\Models\User;

class ShoppingCartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function add(Request $request)
    {
        $product = Product::find($request->id);
        Cart::add(
            $product->id,
            $product->name,
            $product->price,
            1,
            //array("urlfoto"=>product->image)
        );
        //Una vez añadido el producto con los datos de arriba redirije con "back" a la página producto con un mensaje
        return back()->with('success',"$product->name se ha agregado al carrito.");
    }

    public function removeitem(Request $request)
    {
        //$product = Product::where('id', $request->id)->firstOrFail();
        Cart::remove([
            'id' => $request->id,
        ]);
        //Aplicamos el mismo proceso que en la función add de arriba
        return back()->with('success',"Eliminado del carrito.");
    }

    public function clear()
    {
        Cart::clear();
        return back()->with('success',"El carrito se ha vaciado.");
    }

    public function userBalance(Request $request, $id)
    {
        $request->validate([
            'accountBalance' => ['required','numeric']
        ]);

        $user = User::findOrFail($id);
       
        if($user->accountBalance >= $request->accountBalance){
            $user->accountBalance -= $request->accountBalance;
        } else {
            return back()->with('fail',"No hay saldo suficiente.");
        }
        
        $user->save();
        Cart::clear();

        return redirect('/cuenta');
    }

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function show(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function edit(ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShoppingCart $shoppingCart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShoppingCart  $shoppingCart
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShoppingCart $shoppingCart)
    {
        //
    }
}
