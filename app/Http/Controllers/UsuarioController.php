<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;
use App\Models\Evento;
use App\Notifications\EventoNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\DB;

class UsuarioController extends Controller
{
    public function index()
    {
        // Obtener todos los usuarios
        $usuarios = Usuario::all();

        return view('usuarios.index', compact('usuarios'));
    }

    public function inicio()
    {
        return view('layouts/master2');
    }

    // public function suscribirEvento( $eventoId)
    // {
    //     $usuario = Auth::user();
    //     $evento = Evento::find($eventoId);

    //     $usuario->eventos()->attach($evento);

    //     // Puedes agregar aquí la lógica adicional, como redirigir a una página de éxito o mostrar un mensaje de confirmación.
    // }

    // public function enviarNotificaciones()
    // {
    //     // Obtener eventos que están a punto de finalizar
    //     $eventos = Evento::where('fecha_fin', '>=', now())
    //         ->where('fecha_fin', '<=', now()->addDays(7))
    //         ->get();

    //     foreach ($eventos as $evento) {
    //         // Obtener la categoría asociada al evento
    //         $categoria = $evento->categoria;

    //         // Obtener los usuarios que siguen la categoría
    //         $usuarios = $categoria->usuarios;

    //         foreach ($usuarios as $usuario) {
    //             // Enviar la notificación al usuario
    //             $usuario->notify(new EventoFinalizandoNotificacion($evento));
    //         }
    //     }
    // }

    public function ordenar(Request $request, $sort)
    {
        // Obtener todos los usuarios y aplicar la ordenación
        $usuarios = Usuario::orderBy($sort)->get();

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
        return view('usuarios.show', ['usuario' => $usuario]);
    }
    public function perfil($id)
    {
        $usuario = Usuario::find($id);
        return view('usuarios.perfil', ['usuario' => $usuario]);
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'Nombre' => 'required',
                'email' => 'required|email|unique:Usuario,email',
                'password' => 'required|min:8',
                'es_Admin' => 'nullable|boolean',
                'foto' => 'nullable|image|max:2048',
            ]);

            $usuario = new Usuario;
            $usuario->Nombre = $request->Nombre;
            $usuario->email = $request->email;

            if ($request->hasFile('foto')) {
                $foto = $request->file('foto');
                $photoName = 'profile_' . $usuario->id . '.' . $foto->getClientOriginalExtension();
                $foto->storeAs('profile_photos', $photoName, 'public');
                $usuario->foto = $photoName;
            }
            $usuario->biografia = $request->biografia;
            $usuario->password = bcrypt($request->password);
            $usuario->es_Admin = false;
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

        return $this->index();
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
