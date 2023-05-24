<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento;
use App\Models\Categoria;
use App\Models\Hilo;
use App\Models\Tuit;

class EventoController extends Controller
{

    public function crear()
    {
        $categorias = Categoria::all();

        return view('eventos.crear', ['categorias' => $categorias]);
    }

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
    public function listar(Request $request)
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

        return view('eventos.eventos', ['eventos' => $eventos, 'texto' => $texto, 'fecha' => $fecha]);
    }
    public function ordenar(Request $request, $sort)
    {
        // Validar que el parámetro de ordenación sea válido
        $columnasValidas = ['fecha_ini', 'fecha_fin'];
        if (!in_array($sort, $columnasValidas)) {
            abort(400, 'Ordenación no válida');
        }

        // Obtener todos los eventos ordenados según la columna especificada
        $eventos = Evento::orderBy($sort)->get();

        return view('eventos.index', compact('eventos'));
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
                'fecha_ini' => ['nullable', 'date', function ($attribute, $value, $fail) {
                    if (!empty($value) && strtotime($value) < time()) {
                        $fail('La fecha de inicio debe ser igual o posterior a la fecha actual.');
                    }
                }],
                'fecha_fin' => ['nullable', 'date', 'after_or_equal:fecha_ini'],
            ]);

            $evento = new Evento;
            $evento->texto = $request->input('texto');
            $evento->Imagen = $request->input('Imagen');
            $evento->fecha_ini = $request->input('fecha_ini');
            $evento->fecha_fin = $request->input('fecha_fin');
            $evento->categoria_id = $request->input('categoria_id');
            $evento->fecha_post = now();

            $evento->save();

            return redirect()->route('eventos.index');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'texto' => 'required|string|max:255',
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
        } catch (\Exception $e) {
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

        return redirect()->route('eventos.index');
    }

    public function edit($id)
    {
        $evento = Evento::findOrFail($id);
        return view('eventos.editar', compact('evento'));
    }

    public function show(Evento $evento)
    {
        return view('eventos.show', compact('evento'));
    }

    public function eventosUsuario($usuarioId)
    {
        $eventos = Evento::where('usuario_id', $usuarioId)->get();

        return view('eventos.eventosUsuario', compact('eventos'));
    }

}
