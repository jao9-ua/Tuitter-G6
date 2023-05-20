<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hilo;
use App\Models\Categoria;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class HiloController extends Controller
{

    public function crear()
    {
        $categorias = Categoria::all();

        return view('hilos.crear', ['categorias' => $categorias]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'texto' => 'required|string|max:255',
            'categoria_id' => 'nullable|exists:Categoria,id',
            'imagen' => 'nullable|image'
        ]);

        $hilo = new Hilo();
        $hilo->texto = $request->texto;

        if ($request->hasFile('imagen')) {
            $imagen = $request->file('imagen');
            $photoName = 'hilo_' . $hilo->id . '.' . $imagen->getClientOriginalExtension();
            $imagen->storeAs('hilos_photos', $photoName, 'public');
            $hilo->imagen = $photoName;
        }

        $hilo->fecha = now();

        if ($request->categoria_id) {
            $hilo->categoria_id = $request->categoria_id;
        }

        $hilo->save();

        return redirect()->route('hilos.index');
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
