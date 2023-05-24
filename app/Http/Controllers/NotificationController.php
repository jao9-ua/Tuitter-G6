<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();
        $notificaciones = null;
        if (Auth::check()) {
            
            $notificaciones = $usuario->unreadNotifications;
            $usuario->unreadNotifications->markAsRead();
        } else {
            $notificaciones = null;
        }

        

        return view('layouts.master')->with('notificaciones', $notificaciones);
    }
}
