<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{

    public function index(Request $request)
    {
        $texto = $request->input('texto');
        $fecha = $request->input('fecha');

        $eventos = Evento::query();

        if ($texto) {
            $eventos->where('texto', 'like', '%' . $texto . '%');
        }

        if ($fecha) {
            $eventos->where('fecha_ini', '<=', $fecha)
                ->where('fecha_fin', '>=', $fecha);
        }

        $eventos = $eventos->get();

        return view('eventos.index', ['eventos' => $eventos, 'texto' => $texto, 'fecha' => $fecha]);
    }

    public function search(Request $request, $texto, $fecha = null)
    {
        $eventos = Evento::where('texto', 'like', '%' . $texto . '%');

        if ($fecha) {
            $eventos->where('fecha_inicio', '<', $fecha)
                ->where('fecha_fin', '>', $fecha);
        }

        $eventos = $eventos->get();

        return view('eventos.busqueda', ['resultados' => $eventos]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'texto' => 'required|string|max:255',
            ]);

            $evento = new Evento;
            $evento->Texto = $request->input('Texto');
            $evento->Imagen = $request->input('Imagen');
            $evento->fecha_ini = $request->input('fecha_ini');
            $evento->fecha_fin = $request->input('fecha_fin');
            $evento->fecha_post = now();

            $evento->save();

            return response()->json(['message' => 'Evento creado exitosamente', 'evento' => $evento], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        try{
            $request->validate([
                'texto' => 'required|string',
                'fecha_ini' => 'nullable|date',
                'fecha_fin' => [
                    'nullable',
                    'date',
                    function ($attribute, $value, $fail) use ($request) {
                        $fechaIni = $request->input('fecha_ini');
                        if ($fechaIni && $value && $value < $fechaIni) {
                            $fail('La fecha de fin debe ser mayor o igual que la fecha de inicio.');
                        }
                    },
                ],
            ]);
            $evento = Evento::findOrFail($request->id);

            $evento->texto = $request->input('texto');
            $evento->fecha_ini = $request->input('fecha_ini');
            $evento->fecha_fin = $request->input('fecha_fin');
            $evento->save();

            return redirect('/eventos');
        }catch(\Exception $e){
            return response()->json(['error' => 'Error al crear el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        $evento = Evento::find($id);

        if (!$evento) {
            return response()->json(['message' => 'El evento no existe'], 404);
        }

        $evento->delete();

        return response()->json(['message' => 'El evento ha sido eliminado correctamente'], 200);
    }

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return view('eventos.editar', compact('evento'));
    }
    
    public function show($id)
    {
        $evento = Evento::find($id);
        return view('eventos.show', ['evento' => $evento]);
    }
}
