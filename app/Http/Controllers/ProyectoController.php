<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
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
        $categorys = Categoria::all();
        return view("proyectos", compact("proyects", 'categorys'));
    }
    public function indexcreate()
    {
        $categorys = Categoria::all();
        return view("create_proyectos", compact( 'categorys'));
    }
    public function indexedit(string $id)
    {
        $proyect = Proyecto::findOrFail($id);
        $categories = Categoria::all();
        return view('edit_proyectos', compact('proyect', 'categories'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'route_proyect' => 'nullable|url',
            'route_github' => 'nullable|url',
            'route_pdf' => 'nullable|file|mimes:pdf|max:5120',
            'category_id' => 'required|exists:categorias,id',
        ]);
        $data = $request->only([
            'title',
            'description',
            'route_proyect',
            'route_github',
            'category_id',
        ]);
        

        if ($request->hasFile('thumbnail')) {
            $image = base64_encode(file_get_contents($request->file('thumbnail')->getRealPath()));
            $data['thumbnail'] = $image;
        }

        if ($request->hasFile('route_pdf')) {
            $data['route_pdf'] = $request->file('route_pdf')->store('pdfs', 'public');
        }

        Proyecto::create($data);

        return redirect()->route('create_proyectos')->with('success', 'Proyecto creado exitosamente.');
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $proyect = Proyecto::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'route_proyect' => 'nullable|url',
            'route_github' => 'nullable|url',
            'route_pdf' => 'nullable|file|mimes:pdf|max:5120',
            'category_id' => 'required|exists:categorias,id',
        ]);

        $data = $request->only([
            'title',
            'description',
            'route_proyect',
            'route_github',
            'category_id',
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = base64_encode(file_get_contents($request->file('thumbnail')->getRealPath()));
            $data['thumbnail'] = $image;
        }

        if ($request->hasFile('route_pdf')) {
            if ($proyect->route_pdf) {
                Storage::disk('public')->delete($proyect->route_pdf);
            }
            $data['route_pdf'] = $request->file('route_pdf')->store('pdfs', 'public');
        }

        $proyect->update($data);

        return redirect()->route('create_proyectos')->with('success', 'Proyecto actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $proyet = Proyecto::find($id);
        $proyet->delete();
        return redirect()->route('proyectos')->with('success','Proyecto borrado correctamente');
    }
}
