<?php

namespace Celysium\Authenticate\Middlewares;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class AuthenticateMiddleware
{
    /**
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next)
    {
        if (!$request->header(config('authenticate.user_id'))) {
            throw new AuthenticationException(
                'Unauthenticated.'
            );
        }
        return $next($request);
    }
}
