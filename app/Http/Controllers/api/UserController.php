<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Hash;

use App\Models\User;

use App\Http\Resources\UserResource as UserResource;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $usuarios = User::all();
        $response = [
            'success' => true,
            'message' => "Lista de usuarios",
            'data' => UserResource::collection($usuarios)
        ];
        return response()->json($response, 200);
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
        $usuario = User::find($id);

        if(!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $usuario->name = $request->input('name', $usuario->name);
        $usuario->email = $request->input('email', $usuario->email);
        $usuario->password = Hash::make($request->input('password', $usuario->password));
        $usuario->username = $request->input('username', $usuario->username);
        $usuario->address = $request->input('address', $usuario->address);
        $usuario->accountBalance = $request->input('accountBalance', $usuario->accountBalance);
        $usuario->shippingRegion = $request->input('shippingRegion', $usuario->shippingRegion);
        $usuario->save();

        $data = [
            'message' => 'Usuario modificado',
            'usuario' => $usuario
        ];

        return response()->json($data);
    }

    public function updateBalance(Request $request, $id)
    {
        $request->validate([
            'accountBalance' => ['nullable','integer']
        ]);

        $usuario = User::findOrFail($id);
        $usuario->accountBalance += $request->accountBalance;
        
        $usuario->save();
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
        $usuario = User::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();

        $data = [
            'message' => 'Usuario eliminado',
            'usuario' => $usuario
        ];
        return response()->json($data);
    }
    
}
