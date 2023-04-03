<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hilo;
use App\Models\Tuit;

class SearchController extends Controller
{
    public function index()
    {
        return view('search.index');
    }

    public function searchHilo(Request $request)
    {
        $query = $request->input('q');

        $hilo = Hilo::where('texto', 'LIKE', "%$query%")
                    ->paginate(10);

        return view('search.results', compact('hilo'));
    }

    public function searchTuit(Request $request)
    {
        $query = $request->input('q');

        $hilo = Tuit::where('texto', 'LIKE', "%$query%")
                    ->paginate(10);

        return view('search.results', compact('tuit'));
    }

}
