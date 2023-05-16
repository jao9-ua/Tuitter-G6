<?php

namespace App\Http\Middleware;

use Closure;

class VerificarSesion
{
    public function handle($request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect('login');
        }

        return $next($request);
    }
}
