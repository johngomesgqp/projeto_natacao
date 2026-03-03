<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth; // <-- IMPORTAR O FACADE

class Resolvetenant
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Usa o Facade Auth para checar se há usuário logado
        if (Auth::check()) {
            // Aqui você pode setar tenant ou projeto atual
            // Exemplo:
            // app()->singleton('currentProject', fn() => Auth::user()->projeto);
        }

        return $next($request);
    }
}