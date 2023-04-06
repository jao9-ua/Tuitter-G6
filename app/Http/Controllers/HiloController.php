<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Hilo;

class HiloController extends Controller
{
    public function getHilos()
    {
        $hilo = Hilo::paginate(10);
        return view('hilo', ['hilo' => $hilo]);
    }
}