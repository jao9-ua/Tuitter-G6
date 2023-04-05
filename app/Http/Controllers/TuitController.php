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

   
    public function create(Request $request)
    {
    $request->validate([
        'texto' => 'required|string|max:255',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'orden' => 'required|integer',
        'hilo_id' => 'required|integer|exists:hilos,id',
    ]);

    if ($request->hasFile('imagen')) {
        $image = $request->file('imagen');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $filename);
    } else {
        $filename = null;
    }

    $tuit = new Tuit;
    $tuit->texto = $request->texto;
    $tuit->imagen = $filename;
    $tuit->orden = $request->orden;
    $tuit->hilo_id = $request->hilo_id;
    $tuit->save();

    return response()->json([
        'message' => 'Tuit creado exitosamente',
        'data' => $tuit
    ], 201);
}

/*public function update(Request $request, $id)
{
    $tuit = Tuit::findOrFail($id);

    $request->validate([
        'texto' => 'required|string|max:255',
        'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'orden' => 'required|integer',
        'hilo_id' => 'required|integer|exists:hilos,id',
    ]);

    if ($request->hasFile('imagen')) {
        $image = $request->file('imagen');
        $filename = time() . '.' . $image->getClientOriginalExtension();
        $destinationPath = public_path('/images');
        $image->move($destinationPath, $filename);
    } else {
        $filename = $tuit->imagen;
    }

    $tuit->texto = $request->texto;
    $tuit->imagen = $filename;
    $tuit->orden = $request->orden;
    $tuit->hilo_id = $request->hilo_id;
    $tuit->save();

    return response()->json([
        'message' => 'Tuit actualizado exitosamente',
        'data' => $tuit
    ], 200);
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
