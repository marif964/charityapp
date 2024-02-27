<?php

namespace App\Http\Middleware;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

use Closure;
use Illuminate\Http\Request;

class DonerAuthenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
        
        if ($this->auth->guard('doner')->check()) {
                return $this->auth->shouldUse('doner');
            }

        $this->unauthenticated($request, ['doner']);
    }

    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (!$request->expectsJson()) {
            return route('doner.login');
        }
    }
}
