<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Usuario;

class CategoriaController extends Controller
{

    public function crear()
    {
        return view('categorias.crear');
    }

    public function index()
    {
        $categorias = Categoria::all();

        return view('categorias.index', ['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'hashtag' => 'required|max:255',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            $categoria = new Categoria();
            $categoria->hashtag = $validatedData['hashtag'];
            $categoria->views = 0;

            if ($request->hasFile('imagen')) {
                $imagen = $request->file('imagen');
                $photoName = 'categoria_' . $categoria->id . '.' . $imagen->getClientOriginalExtension();
                $imagen->storeAs('categoria_photos', $photoName, 'public');
                $categoria->imagen = $photoName;
            }

            $categoria->save();

            return $this->index();
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {

        $categoria = Categoria::findOrFail($id);

        $validatedData = $request->validate([
            'Hashtag' => 'required|string|max:255',
            'Views' => 'required|integer|min:0',
            'Imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $categoria->Hashtag = $validatedData['Hashtag'];
        $categoria->Views = $validatedData['Views'];

        /*if ($request->hasFile('Imagen')) {
        $image = $request->file('Imagen');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images'), $imageName);
        $categoria->Imagen = $imageName;
    }*/

        $categoria->save();

        return response()->json([
            'message' => 'Categoria actualizada exitosamente',
            'categoria' => $categoria
        ], 200);
    }


    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->increment('views');
        return view('categorias.show', ['categoria' => $categoria]);
    }


    public function categoriasUsuario($usuarioId)
    {   
        $usuario = Usuario::findOrFail($usuarioId);
        
        $categorias = $usuario->categorias;
        
        return view('categorias.categoriasUsuario', compact('categorias'));
    }


}
