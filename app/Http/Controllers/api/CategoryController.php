<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Cat;

use App\Http\Resources\CategoryResource as CategoryResource;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Cat::all();
        $response = [
            'success' => true,
            'message' => "Lista de categorias",
            'data' => CategoryResource::collection($cats)
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
        $existingCat = Cat::where('name', $request->name)->first();

        if ($existingCat) {
            return response()->json(['error' => 'Categoría ya existente'], 409);
        }

        $cat = new Cat;
        $cat->name = $request->name;
        $cat->user_id = $request->user_id;
        $cat->save();

        $data = [
            'message' => 'Categoría creada',
            'categoria' => $cat
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cat = Cat::find($id);
        if ($cat == null) {
            $response = [
                'success' => false,
                'message' => "Categoria no encontrada"
            ];
            return response()->json($response, 404);

        } else {
            $response = [
                'success' => true,
                'data' => new CategoryResource($cat),
                'message' => "Categoria encontrada"
            ];
            return response()->json($response, 200);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $categoria = Cat::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrada'], 404);
        }

        $categoria->name = $request->input('name', $categoria->name);
        $categoria->user_id = $request->input('user_id', $categoria->user_id);
        $categoria->save();

        $data = [
            'message' => 'Categoría actualizada',
            'categoria' => $categoria
        ];
        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = Cat::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'Categoría no encontrado'], 404);
        }

        $categoria->delete();

        $data = [
            'message' => 'Categoría eliminada',
            'categoria' => $categoria
        ];
        return response()->json($data);
    }
}
