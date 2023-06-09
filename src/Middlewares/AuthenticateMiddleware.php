<?php

namespace Celysium\Authenticate\Middlewares;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Celysium\Logger\Facades\Logger;

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
