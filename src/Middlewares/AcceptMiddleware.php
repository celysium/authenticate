<?php

namespace Celysium\Authenticate\Middlewares;

use Closure;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;

class AcceptMiddleware
{
    /**
     * @throws AuthenticationException
     */
    public function handle(Request $request, Closure $next)
    {

        if (!$request->hasHeader(config('authenticate.user_id'))) {
            throw new AuthenticationException(
                'Unauthenticated.'
            );
        }

        return $next($request);
    }
}
