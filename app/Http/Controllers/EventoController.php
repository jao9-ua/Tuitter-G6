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
            $eventos->where('texto', 'like', '%'.$texto.'%');
        }

        if ($fecha) {
            $eventos->where('fecha_inicio', '<', $fecha)
                    ->where('fecha_fin', '>', $fecha);
        }

        $eventos = $eventos->get();

        return view('eventos.index', ['eventos' => $eventos, 'texto' => $texto, 'fecha' => $fecha]);
    }
 
    public function search(Request $request, $texto, $fecha = null)
    {
        $eventos = Evento::where('texto', 'like', '%'.$texto.'%');

        if ($fecha) {
            $eventos->where('fecha_inicio', '<', $fecha)
                    ->where('fecha_fin', '>', $fecha);
        }

        $eventos = $eventos->get();

        return view('eventos.busqueda', ['resultados' => $eventos]);
    }
   
    public function store(Request $request)
    {
        try{
            $request->validate([
                'Texto' => 'required|string|max:255',
            ]);
        
            $evento = new Evento;
            $evento->Texto = $request->input('Texto');
            $evento->Imagen = $request->input('Imagen');
            $evento->fecha_ini = $request->input('fecha_ini');
            $evento->fecha_fin = $request->input('fecha_fin');
            $evento->fecha_post = now();
        
            $evento->save();
        
            return response()->json(['message' => 'Evento creado exitosamente', 'evento' => $evento], 201);
        }catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, Evento $evento)
    {
        $validatedData = $request->validate([
            'Texto' => 'required|string',
            'fecha_ini' => 'required|date',
            'fecha_fin' => 'required|date|after_or_equal:fecha_ini'
        ]);

        $evento->update($validatedData);

        return redirect()->route('eventos.show', ['evento' => $evento->id]);
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
    return view('editar_evento', compact('evento'));
    }
        public function show(Evento $evento)
    {
        return view('eventos.show', compact('evento'));
    }

}
