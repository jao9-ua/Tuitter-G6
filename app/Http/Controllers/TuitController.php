<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tuit;
use App\Models\Hilo;

class TuitController extends Controller
{
    public function crear(Hilo $hilo)
    {
        return view('tuits.crear', compact('hilo'));
    }

    public function index()
    {
        $tuits = Tuit::all();

        return view('tuits.index', ['tuits' => $tuits]);
    }

    public function create(Hilo $hilo)
    {
        return view('crearObjetos.tuit', compact('hilo'));
    }

    public function store(Request $request, Hilo $hilo)
    {
        $request->validate([
            'texto' => 'required|max:280',
            'imagen' => 'nullable|image|max:2048',
            'hilo_id' => 'required|exists:Hilo,id'
        ]);

        $hilo = Hilo::findOrFail($request->input('hilo_id'));

        $tuit = new Tuit($request->all());

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $nombre_imagen = time() . '_' . $imagen->getClientOriginalName();
            $tuit->imagen = $imagen->storeAs('public/tuits', $nombre_imagen);
        }

        $tuit->hilo_id = $hilo->id;
        $tuit->fecha = now();
        $tuit->orden = $hilo->tuits->count() + 1;
        $tuit->save();

        return redirect()->route('hilos.index', $hilo->id);
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
