<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;

class ProyectoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $proyects = Proyecto::all();
        return view("/", compact("proyects"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|string|max:255',
            'route_proyect' => 'nullable|url',
            'route_github' => 'nullable|url',
            'route_pdf' => 'nullable|url',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        Proyecto::create($request->all());

        return redirect()->route('')->with('success', 'Proyecto creado exitosamente.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proyect = Proyecto::findOrFail($id);
        $request->validate([
            'title' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|string|max:255',
            'route_proyect' => 'nullable|url',
            'route_github' => 'nullable|url',
            'route_pdf' => 'nullable|url',
            'categoria_id' => 'required|exists:categorias,id',
        ]);
        $proyect->update($request->all());
        return redirect()->route('')->with('success','Proyecto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proyet = Proyecto::find($id);
        $proyet->delete();
        return redirect()->route('')->with('success','Proyecto borrado correctamente');
    }
}
