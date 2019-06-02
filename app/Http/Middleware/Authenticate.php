<?php

namespace App\Http\Middleware;

use Exception;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     * @throws Exception
     */
    protected function redirectTo($request)
    {
        // if (! $request->expectsJson()) {
        //     return route('login');
        // }
        throw new Exception('Você não tem acesso', 401);
    }
}
