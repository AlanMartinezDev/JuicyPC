<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\ShoppingCart;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['nullable','string', 'max:255'],
            'username' => ['nullable','string', 'max:255', 'unique:users,username,'.$id],
            'address' => ['nullable','string', 'max:255'],
            'image' => ['nullable','image'],
            'shippingRegion' => ['nullable'],
            'password' => ['nullable','string', 'same:cpassword'],
        ]);

        $user = User::find($id);
        if (!$user) {
            // maneja el caso en el que no se encuentre el usuario con el ID proporcionado
            return redirect()->back()->withErrors(['No se ha encontrado el usuario con el ID proporcionado']);
        }

        //$imageUrl = $request->image->store('users');

        $user->name = $request->name;
        $user->username = trim(strip_tags($request->username));
        $user->address = $request->address;

        if ($request->hasFile('image')) {
            // funciones para almacenar imagen
            $extension = $request->image->extension();
            $imageUrl = $request->image->move(public_path('images/users'), $user->username.".".$extension);
            $user->image = 'images/users/'.$user->username.".".$extension;
        }
        
        if($request->shippingRegion == 'Escoge una región...'){ 
            $user->shippingRegion = $user->shippingRegion;
        } 
        else {
            $user->shippingRegion = $request->shippingRegion;
        }
        if($request->password != "") $user->password = Hash::make($request->password);
        $user->save();
        //dd($user->username);
        return redirect('/cuenta');
    }

    public function updateBalance(Request $request, $id)
    {
        $request->validate([
            'accountBalance' => ['nullable','integer']
        ]);

        $user = User::findOrFail($id);
        $user->accountBalance += $request->accountBalance;
        
        $user->save();
        //dd($user->username);
        return redirect('/cuenta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = auth()->user();
        
        $user->delete();
        return redirect('/');
    }
    
}
