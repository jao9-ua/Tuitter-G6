<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;

class EventoController extends Controller
{
    public function index()
    {
        $eventos = Evento::all();
        
        return view('eventos.index', ['eventos' => $eventos]);
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
        $request->validate([
            'Texto' => 'required|string|max:255',
            'fecha_ini' => 'required|date',
            'fecha_fin' => 'required|date|after:fecha_ini',
        ]);
    
        $evento = new Evento;
        $evento->Texto = $request->input('Texto');
        $evento->fecha_ini = $request->input('fecha_ini');
        $evento->fecha_fin = $request->input('fecha_fin');
        $evento->fecha_post = now();
    
        $evento->save();
    
        return response()->json(['message' => 'Evento creado exitosamente', 'evento' => $evento], 201);
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
}
