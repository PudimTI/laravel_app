<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{

    /**
     * Logica para redirecionar o usuário para a página de login caso ele não esteja autenticado
     */
    protected function redirectTo(Request $request): ?string
    {
        if ($request->expectsJson() == false) {
            return '/';
        }
    
    }
} 