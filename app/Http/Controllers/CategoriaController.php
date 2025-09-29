<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Categoria::all();
        return view("/create_etiqueta", compact("categories"));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "name"=> "required|string|max:255",
        ]);
        Categoria::create($request->all());
        return redirect()->route("categorias.index")->with("success","Categoria creada");
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        Categoria::findOrFail($id)->update($request->all());
        return redirect()->route('/create_etiqueta')->with('success','Categoria actualizada');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Categoria::findOrFail($id)->delete();
        return redirect()->route('/create_etiqueta')->with('success','Eliminado correctamente');
    }
}
