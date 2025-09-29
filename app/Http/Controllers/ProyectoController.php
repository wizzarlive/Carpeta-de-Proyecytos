<?php

namespace App\Http\Controllers;

use App\Models\Proyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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

        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            $image = file_get_contents($request->file('thumbnail')->getRealPath());
            $data['thumbnail'] = $image; // Guarda el contenido binario
        }

        if ($request->hasFile('route_pdf')) {
            $data['route_pdf'] = $request->file('route_pdf')->store('pdfs', 'public');
        }

        Proyecto::create($data);

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
        $data = $request->all();

        if ($request->hasFile('thumbnail')) {
            $image = file_get_contents($request->file('thumbnail')->getRealPath());
            $data['thumbnail'] = $image;
        }

        if ($request->hasFile('route_pdf')) {
            if ($proyect->route_pdf) {
                Storage::disk('public')->delete($proyect->route_pdf);
            }
            $data['route_pdf'] = $request->file('route_pdf')->store('pdfs', 'public');
        }
        $proyect->update($data);    
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
