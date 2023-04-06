<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UsuarioController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();
        
        return view('usuarios.index', ['usuarios' => $usuarios]);
    }

    public function show($id)
    {
        $user = Usuario::find($id);
        return view('users.show', ['user' => $user]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email|unique:usuarios',
            'password' => 'required|min:8',
            'es_admin' => 'required|boolean'
        ]);

        $usuario = new Usuario;
        $usuario->nombre = $request->nombre;
        $usuario->correo = $request->correo;
        $usuario->foto = $request->foto;
        $usuario->biografia = $request->biografia;
        $usuario->password = bcrypt($request->password);
        $usuario->es_admin = $request->es_admin;
        $usuario->save();

        return response()->json(['message' => 'Usuario creado exitosamente'], 201);
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
    

}
