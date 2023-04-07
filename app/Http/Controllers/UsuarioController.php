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
        $es_admin = $request->input('es_admin');

        // Filtrar los usuarios según los parámetros recibidos
        $usuarios = Usuario::when($nombre, function ($query, $nombre) {
                            return $query->where('Nombre', 'like', '%'.$nombre.'%');
                        })
                        ->when($email, function ($query, $email) {
                            return $query->where('email', 'like', '%'.$email.'%');
                        })
                        ->when($es_admin, function ($query, $es_admin) {
                            return $query->where('es_Admin?', $es_admin);
                        })
                        ->get();

        return view('usuarios.index', compact('usuarios'));
    }
    public function buscar(Request $request)
    {
        $nombre = $request->input('nombre');
        $usuarios = Usuario::where('Nombre', 'like', '%' . $nombre . '%')->paginate(10);
        return view('usuarios.lista', compact('usuarios'));
    }

    public function show($id)
    {
        $usuarios = Usuario::find($id);
        return view('usuarios.filtrar', ['usuarios' => $usuarios]);
    }

    public function store(Request $request)
    {
        try{
            $request->validate([
                'Nombre' => 'required',
                'email' => 'required|email|unique:Usuario',
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
        }catch (\Exception $e) {
            return response()->json(['error' => 'Error al crear el usuario: ' . $e->getMessage()], 500);
        }
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::find($id);
        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email|unique:usuarios,correo,'.$usuario->id,
            'password' => 'sometimes|min:8',
            'es_admin' => 'required|boolean'
        ]);

        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->correo;
        $usuario->foto = $request->foto;
        $usuario->biografia = $request->biografia;
        if ($request->password) {
            $usuario->password = bcrypt($request->password);
        }
        $usuario->es_admin = $request->es_admin;
        $usuario->save();

        return response()->json(['message' => 'Usuario actualizado exitosamente'], 200);
    }
    
    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        return view('editar_usuario', compact('usuario'));
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
