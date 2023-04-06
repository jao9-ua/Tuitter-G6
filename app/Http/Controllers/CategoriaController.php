<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        
        return view('categorias.index', ['categorias' => $categorias]);
    }
    public function store(Request $request)
    {

    $validatedData = $request->validate([
        'hashtag' => 'required|max:255',
        'views' => 'required|integer',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
    ]);

    $categoria = new Categoria();
    $categoria->hashtag = $validatedData['hashtag'];
    $categoria->views = $validatedData['views'];

    /*if ($request->hasFile('imagen')) {
        $image = $request->file('imagen');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $path = public_path('images/' . $filename);
        Image::make($image->getRealPath())->resize(300, 300)->save($path);
        $categoria->imagen = $filename;
    }*/

    $categoria->save();

    return redirect()->route('categorias.show', $categoria->id);
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

}
