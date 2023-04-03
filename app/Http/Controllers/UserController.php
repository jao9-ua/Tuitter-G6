<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Usuario;

class UserController extends Controller
{
    public function show($id)
    {
        $user = Usuario::find($id);
        return view('users.show', ['user' => $user]);
    }
}
