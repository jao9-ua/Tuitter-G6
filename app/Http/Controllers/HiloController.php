<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hilo;

class HiloController extends Controller
{
    public function store(Request $request)
    {
    $validatedData = $request->validate([
        'texto' => 'required|string',
        'imagen' => 'nullable|image',
    ]);

    $hilo = new Hilo();
    $hilo->texto = $request->texto;

    if ($request->hasFile('imagen')) {
        $path = $request->file('imagen')->store('public/images');
        $hilo->imagen = $path;
    }

    $hilo->fecha= now();

    $hilo->save();

    return response()->json([
        'message' => 'Hilo creado exitosamente',
        'data' => $hilo
    ]);
    }

    public function update(Request $request, $id)
    {
    $validatedData = $request->validate([
        'texto' => 'nullable|string',
        'imagen' => 'nullable|image',
    ]);

    $hilo = Hilo::findOrFail($id);

    if ($request->has('texto')) {
        $hilo->texto = $request->texto;
    }

    /*if ($request->hasFile('imagen')) {
        Storage::delete($hilo->imagen);
        $path = $request->file('imagen')->store('public/images');
        $hilo->imagen = $path;
    }*/

    $hilo->save();

    return response()->json([
        'message' => 'Hilo actualizado exitosamente',
        'data' => $hilo
    ]);
}




    public function index()
    {
        $hilos = Hilo::all();
        
        return view('hilos.index', ['hilos' => $hilos]);
    }

    public function show($id)
    {
        $hilo = Hilo::find($id);

        return view('hilos.show', ['hilo' => $hilo]);
    }
    
    public function destroy($id)
    {

        $hilo = Hilo::find($id);
        $hilo->delete();

        return redirect()->route('hilos.index');
    }
}
