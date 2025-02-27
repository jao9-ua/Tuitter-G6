<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;
use App\Models\Usuario;
use App\Models\Evento;
use App\Models\Hilo;

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

            return redirect()->route('categorias.buscar', ['orden' => 'fecha']);
       
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

    public function mostrar($id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->increment('views');
        
        $eventos = Evento::where('categoria_id', $id)
                    ->orderBy('fecha_ini', 'desc')
                    ->get();
                    
        $hilos = Hilo::where('categoria_id', $id)
                    ->orderBy('fecha', 'desc')
                    ->paginate(10);

        return view('categorias.mostrar', compact('categoria', 'eventos', 'hilos'));
    }
    public function buscar(Request $request)
    {
        $categorias = Categoria::query();
        // Verificar si se ha enviado un término de búsqueda
        if ($request->has('search')) {
            $searchTerm = '%' . $request->input('search') . '%';
            $categorias->where('hashtag', 'like', $searchTerm);
        }

        $categorias = $categorias->paginate(9);

        return view('categorias.categoriasUsuario', compact('categorias'));
    }
    public function search(Request $request)
    {
        $searchTerm = $request->get('term');
    
        $categorias = Categoria::where('hashtag', 'LIKE', '%' . $searchTerm . '%')->get();
    
        return response()->json($categorias);
    }

    public function categoriasUsuario($usuarioId)
    {   
        $usuario = Usuario::findOrFail($usuarioId);
        
        $categorias = $usuario->categorias;
        
        return view('categorias.categoriasUsuario', compact('categorias'));
    }

    public function destroy($id)
{
    $categoria = Categoria::find($id);

        if (!$categoria) {
            return response()->json(['message' => 'La categoria no existe'], 404);
        }

        $categoria->delete();

        return redirect()->route('categorias.index');
}


}
