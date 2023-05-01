<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios
        $usuarios = Usuario::all();

        return view('usuarios.index', compact('usuarios'));
    }

    public function filtrar(Request $request)
    {
        $nombre = $request->input('nombre');
        $email = $request->input('email');

        $usuarios = Usuario::query();

        if ($nombre) {
            $usuarios->where('nombre', 'like', '%' . $nombre . '%');
        }

        if ($email) {
            $usuarios->where('email', 'like', '%' . $email . '%');
        }

        $usuarios = $usuarios->get();

        return view('usuarios.filtrar', ['usuarios' => $usuarios]);
    }

    public function buscar(Request $request)
    {
        $nombre = $request->input('Nombre');
        $usuarios = Usuario::where('Nombre', 'like', '%' . $nombre . '%')->paginate(10);
        return view('usuarios.lista', compact('usuarios'));
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);
        return view('usuarios.editar', ['usuario' => $usuario]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'Nombre' => 'required',
                'email' => 'required|email|unique:Usuario,email',
                'password' => 'required|min:8',
                'es_Admin' => 'required|boolean'
            ]);

            $usuario = new Usuario;
            $usuario->Nombre = $request->Nombre;
            $usuario->email = $request->email;
            $usuario->foto = $request->foto;
            $usuario->biografia = $request->biografia;
            $usuario->password = bcrypt($request->password);
            $usuario->es_Admin = $request->es_Admin;
            $usuario->save();

            return response()->json(['message' => 'Usuario creado exitosamente'], 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        try {
            $request->validate([
                'Nombre' => 'required',
                'email' => 'required|email',
                'biografia' => 'required',
            ]);

            $usuario = Usuario::findOrFail($request->id);

            if (!$usuario) {
                return response()->json(['message' => 'Usuario no encontrado'], 404);
            }

            $usuario->Nombre = $request->input('Nombre');
            $usuario->foto = $request->input('foto');
            $usuario->biografia = $request->input('biografia');
            if ($request->input('password')) {
                $usuario->password = bcrypt($request->input('password'));
            }


            $usuario->email = $request->input('email');


            $usuario->es_Admin = true;
            $usuario->save();

            return redirect('/usuarios');
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al cambiar el usuario: ' . $e->getMessage()], 500);
        }
    }


    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('usuarios.editar', compact('usuario'));
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado exitosamente'], 200);
    }
}
