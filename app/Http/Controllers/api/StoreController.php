<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Store;

use App\Http\Resources\StoreResource as StoreResource;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stores = Store::all();
        $response = [
            'success' => true,
            'message' => "Lista de almacenes",
            'data' => StoreResource::collection($stores)
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
        $store = new Store;
        $store->name = $request->name;
        $store->address = $request->address;
        $store->contact = $request->contact;
        $store->user_id = $request->user_id;
        $store->save();

        $product_id = $request->product_id; // Obtener el product_id de la solicitud

        // Crear un nuevo registro en la tabla intermedia
        DB::table('product_store')->insert([
            'store_id' => $store->id,
            'product_id' => $product_id
        ]);

        $data = [
            'message' => 'Almacen creado',
            'store' => $store
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $store = Store::find($id);
        if($store == null) {
            $response = [
                'success' => false,
                'message' => "Almacen no encontrado"
            ];
            return response()->json($response, 404);

        } else {
            $response = [
                'success' => true,
                'data' => new StoreResource($store),
                'message' => "Almacen encontrado"
            ];
            return response()->json($response, 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $store = Store::find($id);

        if (!$store) {
            return response()->json(['message' => 'Almacen no encontrado'], 404);
        }

        $data = [
            'message' => 'Editar Almacen',
            'store' => $store
        ];
        return response()->json($data);
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
        $store = Store::find($id);

        if (!$store) {
            return response()->json(['message' => 'Almacen no encontrado'], 404);
        }

        $store->name = $request->input('name', $store->name); //$producto->name);
        $store->address = $request->input('address', $store->address);
        $store->contact = $request->input('contact', $store->contact);
        $store->user_id = $request->input('user_id', $store->user_id);
        $store->save();


        // Actualizar la relación en la tabla intermedia si se proporciona un cat_id
        if ($request->has('product_id')) {
            $product_id = $request->product_id;
            DB::table('product_store')
                ->where('store_id', $store->id)
                ->update(['product_id' => $product_id]);
        }

        $data = [
            'message' => 'Almacen actualizado',
            'store' => $store
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $store = Store::find($id);

        if (!$store) {
            return response()->json(['message' => 'Almacen no encontrado'], 404);
        }

        // Eliminar la relación en la tabla intermedia
        DB::table('product_store')->where('store_id', $store->id)->delete();

        $store->delete();

        $data = [
            'message' => 'Almacen eliminado',
            'store' => $store
        ];
        return response()->json($data);
    }

}