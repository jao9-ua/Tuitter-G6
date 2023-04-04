<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hilo;

class HiloController extends Controller
{
    
    public function index()
    {
        $hilos = Hilo::all();
        
        return view('hilos.index', ['hilos' => $hilos]);
    }

    public function show($id)
    {
        $hilo = Hilo::find($id);

        return view('hilos.show', ['hilo' => $hilo]);
    }
    
    public function destroy($id)
    {

        $hilo = Hilo::find($id);
        $hilo->delete();

        return redirect()->route('hilos.index');
    }
}
