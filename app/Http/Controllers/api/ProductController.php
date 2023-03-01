<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Product;

use App\Http\Resources\ProductResource as ProductResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Product::all();
        $response = [
            'success' => true,
            'message' => "Lista de productos",
            'data' => ProductResource::collection($productos)
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
        $producto = new Product;
        $producto->name = $request->name;
        $producto->price = $request->price;
        $producto->description = $request->description;
        $producto->brand = $request->brand;
        $producto->user_id = $request->user_id;
        $producto->save();

        $cat_id = $request->cat_id; // Obtener el cat_id de la solicitud

        // Crear un nuevo registro en la tabla intermedia
        DB::table('product_cat')->insert([
            'product_id' => $producto->id,
            'cat_id' => $cat_id
        ]);

        $data = [
            'message' => 'Producto creado',
            'producto' => $producto
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
        $producto = Product::find($id);
        if($producto == null) {
            $response = [
                'success' => false,
                'message' => "Producto no encontrado"
            ];
            return response()->json($response, 404);

        } else {
            $response = [
                'success' => true,
                'data' => new ProductResource($producto),
                'message' => "Producto encontrado"
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
        $producto = Product::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->name = $request->input('name', $producto->name);
        $producto->price = $request->input('price', $producto->price);
        $producto->description = $request->input('description', $producto->description);
        $producto->brand = $request->input('brand', $producto->brand);
        $producto->user_id = $request->input('user_id', $producto->user_id);
        $producto->save();

        // Actualizar la relación en la tabla intermedia si se proporciona un cat_id
        if ($request->has('cat_id')) {
            $cat_id = $request->cat_id;
            DB::table('product_cat')
                ->where('product_id', $producto->id)
                ->update(['cat_id' => $cat_id]);
        }

        $data = [
            'message' => 'Producto actualizado',
            'producto' => $producto
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
        $producto = Product::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        // Eliminar la relación en la tabla intermedia
        DB::table('product_cat')->where('product_id', $producto->id)->delete();

        $producto->delete();

        $data = [
            'message' => 'Producto eliminado',
            'producto' => $producto
        ];
        return response()->json($data);
    }

}
