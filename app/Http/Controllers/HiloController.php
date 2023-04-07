<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hilo;
use Illuminate\Support\Facades\Redirect;

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

        $hilo->fecha = now();

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
        $hilos = Hilo::with('tuits')->get();
        return view('hilos.index', compact('hilos'));
    }

    public function show($id)
    {
        $hilo = Hilo::with('tuits')->find($id);

        return view('hilos.show', ['hilo' => $hilo]);
    }


    public function destroy($id)
    {

        $hilo = Hilo::find($id);
        $hilo->delete();

        return redirect()->route('hilos.index');
    }

    public function getHilos()
    {
        $hilo = Hilo::paginate(10);
        return view('/layouts/master', ['hilo' => $hilo]);
    }
}
