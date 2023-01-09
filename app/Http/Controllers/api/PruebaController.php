<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all(['id','name','email','username']);

        $response = [
            'success' => true,
            'message' => 'Listado de usuarios',
            'data' => $users,
        ];

        return response()->json($response,400);
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
        $user = User::find($id);

        if ($user == null) {
            $response = [
                'success' => false,
                'message' => 'Usuario no encontrado',
                'data' => [],
            ];
            
            return response()->json($response,404);
        }

        $response = [
            'success' => true,
            'message' => 'Usuario encontrado',
            'data' => $user,
        ];

        return response()->json($response,200);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);

        if ($user == null) {
            $response = [
                'success' => false,
                'message' => 'Usuario no encontrado',
                'data' => [],
            ];
            
            return response()->json($response,404);
        }

        try {
            $planet->delete();

            $response = [
                'success' => true,
                'message' => 'Usuario borrado',
                'data' => $user,
            ];

            return response()->json($response,200);
        }
        catch(\Exception $e) {
            $response = [
                'success' => false,
                'message' => 'Error borrando usuario',
            ];

            return response()->json($response,400);
        }
    }
}
