<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UserController extends Controller
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

    //public function edit($id) {}
}
