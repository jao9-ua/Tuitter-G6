<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuit;

class TuitController extends Controller
{
    
    public function index()
    {
        $tuits = Tuit::all();
        
        return view('tuits.index', ['tuits' => $tuits]);
    }

   
    /*public function store(Request $request)
    {
        // Validar los datos del formulario
        $validated = $request->validate([
            'texto' => 'required|max:255',
            'fecha' => 'required|date',
        ]);
        
        // Crear un nuevo tuit en la base de datos
        $tuit = new Tuit();
        $tuit->texto = $validated['texto'];
        $tuit->fecha = $validated['fecha'];
        $tuit->save();
        
        // Redirigir a la lista de tuits
        return redirect()->route('tuits.index');
    }*/
    
    public function show($id)
    {
        $tuit = Tuit::find($id);

        return view('tuits.show', ['tuit' => $tuit]);
    }
    
    public function destroy($id)
    {

        $tuit = Tuit::find($id);
        $tuit->delete();

        return redirect()->route('tuits.index');
    }
}
